<?php

namespace App\Http\Controllers;

use App\Exports\BookExport;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('search')) {
            $books = Book::where('judul', 'LIKE', '%' . $request->search . '%')->paginate(4);
        } else {
            $books = Book::paginate(4);
        }
        

        return view('admin/books/index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/books/create', [
            "title" => "Books"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $book = Book::create($request->all());


        // $this->validate($request, [
        //     'judul' => 'required',
        //     'pengarang' => 'required',
        //     'gambar' => 'required',
        //     'penerbit' => 'required',
        //     'thn_terbit' => 'required',
        //     'jml_halaman' => 'required',
        // ]);

        if (!empty($request->file('gambar'))) {
            $book = $request->all();
            $book['gambar'] = $request->file('gambar')->store('book');

            Book::create($book);

            return redirect()->route('books.index');
        } else{
            $book = $request->all();
            Book::create($book);

            return redirect()->route('books.index');
        }

        //$book->save();

        // return redirect()->route('books.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $books = Book::find($id);
        $bukus = Book::where('id', $id)->get();
        $title = Book::all();

        // return view ('detail', compact('books'));
        return view('detail', [
            'books' => $books,
            'bukus' => $bukus,
            'title' => $books
        ]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin/books/edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // if (empty($request->file('gambar'))) {
        //     $book = Book::findOrFail($id);
        //     $book->update($request->all());
        //     // $book->save();

        //     return redirect()->route('books.index');
        // } else {
        //     $book = Book::findOrFail($id);
        //     Storage::delete($book->gambar);
        //     $book->update($request->all());

        //     return redirect()->route('books.index');
        // }
        

        // $book = Book::findOrFail($id);
        // $book->update($request->all());
        // $book->save();

        // return redirect()->route('books.index');

        if (empty($request->file('gambar'))) {

            $books = Book::find($id);
            $books->update([
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'thn_terbit' => $request->thn_terbit,
                'jml_halaman' => $request->jml_halaman,
            ]);
            return redirect()->route('books.index');
        } else {
            
            $books = Book::find($id);
            Storage::delete($books->gambar);
            $books->update([
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'thn_terbit' => $request->thn_terbit,
                'jml_halaman' => $request->jml_halaman,
                'gambar' => $request->file('gambar')->store('book'),
            ]);
            return redirect()->route('books.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index');
    }

    // public function search(Request $request)
    // {
    //     $book = $request->get('search');
    //     if ($book) {    
    //         $books = Book::where('judul', 'LIKE', '%'. $request->get('judul'). '%')->get();
    //     } else {
    //         $books = Book::paginate(12);
    //     }
    //     return view('admin.books.index.', compact('books'));
    // }

    public function tampil(Request $request)
    {
        if ($request->has('search')) {
            $books = Book::where('judul', 'LIKE', '%' . $request->search . '%')->paginate(4);
        } else {
            $books = Book::paginate(4);
        }
        $title = 'Beranda';
        return view('index', [
            'books' => $books, 
            'title' => $title,
        ]);     
    }
    public function export_excel()
	{
		return Excel::download(new BookExport, 'databuku.xlsx');
	}
    public function exportpdf()
    {
        $book = Book::all();

        $pdf = PDF::loadview('databuku-pdf', ['book' => $book])->setOptions(['defaultFont' => 'sans-serif']);;
        return $pdf->download('databuku.pdf');
    }
}   
