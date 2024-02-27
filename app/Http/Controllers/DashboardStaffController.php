<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardStaffController extends Controller
{
    //
    function ShowDashboard()
    {
        $totalActiveMember = User::where('role', 'borrower')->count('id');
        $totalBook = Book::all()->count('id');
        $todayBorrowings = Borrowing::where('status', 'Borrowed')->count('id');
        $totalCategory = Category::all()->count('id');

        $data = [
            'totalActiveMember' => $totalActiveMember,
            'totalBook' => $totalBook,
            'todayBorrowing' => $todayBorrowings,
            'totalCategory' => $totalCategory
        ];


        return view('dashboard-admin.dashboard', $data);
    }

    function showBook()
    {
        // dd(Book::with('categories')->where('id', 9)->get());
        $data = [
            'books' => Book::with('categories')->get()
        ];
        return view('dashboard-staff.book.index', $data);
    }

    function insertBook(Request $request)
    {
        if ($request->isMethod('get')) {
            $category = Category::all();
            $selectedCategories = [];
            return view('dashboard-staff.book.form', ["categories" => $category, "selectedCategories" => $selectedCategories]);
        } else {
            // dd($request->all());
            $request->validate([
                'title' => 'required|string|min:1|max:255',
                'author' => 'required|string|min:3|max:255',
                'publisher' => 'required|string|min:3',
                'publication_year' => 'required|int|min:4',
                'categories' => 'required|array|min:1',
                'stock' => 'required|int|min:1',
                'cover' => 'image|mimes:jpeg,png,jpg|max:5000',
            ]);

            if ($request->file('cover')) {
                $image = $request->file('cover');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('book-covers', $imageName, 'public');
                $coverName = $imageName;
            } else {
                $coverName = 'cover-default.jpg';
            }

            $book = new Book([
                'title' => $request->title,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'publication_year' => $request->publication_year,
                'stock' => $request->stock,
                'cover' => $coverName
            ]);
            $book->save();

            $book->categories()->sync($request->categories);

            return redirect('/staff/dashboard/book')->with(['message' => 'Book added successfully']);
        }
    }

    function updateBook(Request $request)
    {
        $book = Book::find($request->id);

        if ($request->isMethod('get')) {
            $categories = Category::all();
            $selectedCategories = $book->categories->pluck('id')->toArray();
            $data = [
                'book' => $book,
                'categories' => $categories,
                'selectedCategories' => $selectedCategories,
            ];
            return view('dashboard-staff.book.form', $data);
        } else {

            $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|min:3|max:255',
                'publisher' => 'required|string|min:3',
                'publication_year' => 'required|int|min:6',
                'categories' => 'required|array',
                'stock' => 'required|int|min:1',
                'cover' => 'image|mimes:jpeg,png,jpg|max:5000',
            ]);

            // dd($request->all());

            if ($request->file('cover')) {
                $image = $request->file('cover');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('book-covers', $imageName, 'public');
                $coverName = $imageName;
    
                // Delete the old cover image
                if ($book->cover !== 'cover-default.jpg') {
                    Storage::disk('public')->delete('book-covers/' . $book->cover);
                }
            } else {
                $coverName = $book->cover; // Keep the existing cover image
            }

            $book = Book::find($request->id);
            $book->title = $request->title;
            $book->author = $request->author;
            $book->publisher = $request->publisher;
            $book->publication_year = $request->publication_year;
            $book->stock = $request->stock;
            $book->cover = $coverName;
            $book->save();

            // Simpan relasi kategori ke database
            $book->categories()->sync($request->categories);
            return redirect('/staff/dashboard/book')->with(['message' => 'The book has been changed successfully']);
        }
    }

    function deleteBook(Request $request)
    {
        $book = Book::find($request->id);
        $book->delete();
        return redirect('staff/dashboard/book')->with(['message' => 'The book was successfully deleted']);
    }

    function showDetailBook($id)
    {
        $data = [
            'books' => Book::with('categories', 'reviews.user')->find($id)
        ];
        return view('dashboard-staff.book.detail', $data);
    }

    function showBorrowing()
    {
        $data = [
            'borrowings' => Borrowing::with('book', 'user')->get(),
        ];
        return view('dashboard-staff.borrowing.index', $data);
    }

    function showBorrowingReport(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if (empty($startDate)) {
            $startDate = now()->format('Y-m-d');
        }

        if (empty($endDate)) {
            $endDate = now()->format('Y-m-d');
        }

        $borrowings = Borrowing::with('book', 'user')
        ->whereBetween('borrow_date', [$startDate, $endDate])
        ->get();

        $data = [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'borrowings' => $borrowings
        ];
        return view('dashboard-staff.borrowing.report', $data);
    }

    function generateBorrowingReport(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if (empty($startDate)) {
            $startDate = now()->format('Y-m-d');
        }

        if (empty($endDate)) {
            $endDate = now()->format('Y-m-d');
        }

        $borrowings = Borrowing::with('book', 'user')
        ->whereBetween('borrow_date', [$startDate, $endDate])
        ->get();

        $data = [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'borrowings' => $borrowings
        ];
        return view('report.borrowing', $data);
    }

    function showCategory()
    {

        $data = [
            'categories' => Category::all()
        ];
        return view('dashboard-staff.category.index', $data);
    }

    function insertCategory(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('dashboard-staff.category.form');
        } else {
            $request->validate([
                'name' => 'required|string|max:255'
            ]);

            $category = new Category();
            $category->name = $request->name;
            $category->save();
            return redirect('/staff/dashboard/category')->with(['message' => 'Category added successfully']);
        }
    }

    function updateCategory(Request $request)
    {
        $category = Category::find($request->id);

        if ($request->isMethod('get')) {
            $data = [
                'category' => $category
            ];
            return view('dashboard-staff.category.form', $data);
        } else {
            $request->validate([
                'name' => 'required|string|max:255'
            ]);
            $category->name = $request->name;
            $category->save();
            return redirect('/staff/dashboard/category')->with(['message' => 'Category added successfully']);
        }
    }

    function deleteCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return redirect('/staff/dashboard/category')->with(['message' => 'The officer was successfully deleted']);
    }
}
