<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardMemberController extends Controller
{
    //
    function ShowDashboard()
    {
        $mostBorrowedBooks = Book::withCount('borrowings')
        ->orderByDesc('borrowings_count')
        ->limit(6)
        ->get();

        $latestBooks = Book::latest()
        ->limit(6)
        ->get();

        $data = [
            'mostBorrowedBook' => $mostBorrowedBooks,
            'latestBook' => $latestBooks
        ];

        return view('dashboard-member.dashboard', $data);
    }

    function showBook()
    {
        // dd(Book::with('categories')->where('id', 9)->get());
        $data = [
            'books' => Book::with('categories')
                           ->withAvg('reviews', 'rating')
                           ->get()
        ];
        return view('dashboard-member.book.index', $data);
    }

    function showDetailBook($id)
    {
        $data = [
            'books' => Book::with('categories', 'reviews.user')->find($id)
        ];
        return view('dashboard-member.book.detail', $data);
    }

    function showBorrowedById()
    {
        $userId = session('idUser');

        $data = [
            'borrowings' => Borrowing::with('book', 'user')
                ->where('id_user', $userId)
                ->where('status', 'borrowed')
                ->get(),
        ];

        // dd($data);
        return view('dashboard-member.borrowed.index', $data);
    }

    function showReturnedById()
    {
        $userId = session('idUser');

        $data = [
            'borrowings' => Borrowing::with('book', 'user')
                ->where('id_user', $userId)
                ->where('status', 'returned')
                ->get(),
        ];

        // dd($data);
        return view('dashboard-member.returned.index', $data);
    }

    function showCollectionById()
    {
        $userId = session('idUser');

        $data = [
            'collections' => Collection::with('book')
                ->where('id_user', $userId)
                ->get(),
        ];

        // dd($data);
        return view('dashboard-member.collection.index', $data);
    }

    function showReviewById()
    {
        $userId = session('idUser');

        $data = [
            'reviews' => Review::with('book')
                ->where('id_user', $userId)
                ->get(),
        ];

        // dd($data);
        return view('dashboard-member.review.index', $data);
    }

    function insertBorrowing(Request $request)
    {
        $book = Book::find($request->id);
        $userId = session('idUser');

        if ($request->isMethod('get')) {
            $categories = Category::all();
            $selectedCategories = $book->categories->pluck('id')->toArray();
            $data = [
                'book' => $book,
                'categories' => $categories,
                'selectedCategories' => $selectedCategories,
            ];
            return view('dashboard-member.borrowed.form', $data);
        } else {

            $borrowing = new Borrowing([
                'id_user' => $userId,
                'id_book' => $book->id,
                'borrow_date' => now(),
                'return_date' => null,
                'status' => 'Borrowed'
            ]);
            $borrowing->save();

            $book->decrement('stock');

            return redirect('/member/dashboard/borrowed')->with(['message' => 'Book successfully borrowed']);
        }
    }

    function updateBorrowing(Request $request)
    {
        $book = Book::find($request->id);
        $userId = session('idUser');

        if ($request->isMethod('get')) {
            $categories = Category::all();
            $selectedCategories = $book->categories->pluck('id')->toArray();
            $data = [
                'book' => $book,
                'categories' => $categories,
                'selectedCategories' => $selectedCategories,
            ];
            return view('dashboard-member.returned.form', $data);
        } else {
            $request->validate([
                'comment' => 'string',
                'rating' => 'required|integer|between:1,5',
            ]);

            $review = new Review([
                'id_user' => $userId,
                'id_book' => $book->id,
                'comment' => $request->comment,
                'rating' => $request->rating
            ]);
            $review->save();

            $borrowing = Borrowing::where('id_user', $userId)
            ->where('id_book', $book->id)
            ->whereNull('return_date')
            ->first();

            if ($borrowing) {
                $borrowing->return_date = now();
                $borrowing->status = 'Returned';
                $borrowing->save();
    
                $book->increment('stock');
            }

            return redirect('/member/dashboard/returned')->with(['message' => 'The book was successfully returned']);
        }
    }

    public function addToCollection($bookId)
    {
        $userId = session('idUser');

        // Check if the bookmark already exists
        $existingCollection = Collection::where('id_user', $userId)
            ->where('id_book', $bookId)
            ->first();

        if (!$existingCollection) {
            // If the bookmark doesn't exist, create a new one
            $collection = new Collection([
                'id_user' => $userId,
                'id_book' => $bookId,
            ]);

            $collection->save();

            // You can optionally redirect the user or show a success message
            return redirect()->back()->with(['message' => 'Book added to collection successfully']);
        } else {
            $existingCollection->delete();
            // Bookmark already exists, handle accordingly (e.g., show a message)
            return redirect()->back()->with(['message' => 'Book is already in your collection']);
        }
    }

    function updateReview(Request $request)
    {
        $review = Review::find($request->id);
        // $userId = session('idUser');
        $book = $review->book;

        if ($request->isMethod('get')) {
            $data = [
                'review' => $review,
                'book' => $book,
            ];
            return view('dashboard-member.review.form', $data);
        } else {
            $request->validate([
                'comment' => 'required|string|max:255'
            ]);
            $review->comment = $request->comment;
            $review->rating = $request->rating;
            $review->save();
            return redirect('/member/dashboard/review')->with(['message' => 'Review added successfully']);
        }
    }

    function deleteReview(Request $request)
    {
        $review = Review::find($request->id);
        $review->delete();
        return redirect('/member/dashboard/review')->with(['message' => 'The officer was successfully deleted']);
    }
}
