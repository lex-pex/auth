<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

class RecordController extends Controller
{
    private $folder = 'img/record';

    public function all() {
        $list = Record::all()->sortByDesc('id');
        return view('record.all', ['list' => $list]);
    }

    public function show($id) {
        if(!is_numeric($id) || $id < 1) abort(404);
        if(!$record = Record::find($id)) abort(404);
        return view('record.show', ['record' => $record]);
    }

    public function create() {
        if(Gate::denies('add_record'))
            return redirect('error_page')->with(['message' => 'There is no access to add_record']);
        return view('record.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'text' => 'required|min:5|max:200',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024', // 2048
        ]);
        $data = $request->except('_token', 'image');
        $record = new Record();
        $record->fill($data);
        $record->save();
        if ($file = $request->image) {
            $dateName = date('dmyHis');
            $record->image = $this->fileSave($file, $record->id, $dateName);
            $record->save();
        }
        return redirect('record/' . $record->id);
    }

    public function edit(Record $record) {
        if(!$record) abort(404);
        return view('record.edit', ['record' => $record]);
    }

    public function update(Request $request, Record $record) {
        if(!$record) abort(404);
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'text' => 'required|min:5|max:200',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024', // 2048
        ]);
        $data = $request->except('_token', 'image', 'image_del');
        if($request->has('image_del')) {
            $this->deleteDirectory($this->folder . '/' . $record->id);
            $record->image = '';
        } elseif ($file = $request->image) {
            $this->deleteDirectory($this->folder . '/' . $record->id);
            $dateName = date('dmyHis');
            $record->image = $this->fileSave($file, $record->id, $dateName);
        }
        $record->fill($data);
        $record->save();
        return redirect('record/' . $record->id);
    }

    public function destroy(Record $record) {
        if(!$record) abort(404);
        if($record->image)
                $this->deleteDirectory($this->folder . '/' . $record->id);
        $record->delete();
        return redirect('record/all');
    }

    // _________ Private Helpers: _________

    private function fileSave(UploadedFile $file, $folder, $name) {
        $dir = $this->folder . '/' . $folder;
        if(!File::exists($dir))
            File::makeDirectory($dir);
        $name = $name . '.' . $file->getClientOriginalExtension();
        $file->move($dir, $name);
        return "/$dir/$name";
    }

    private function deleteDirectory($path) {
        if(File::exists($path))
            File::deleteDirectory($path);
    }

    //  File::makeDirectory($this->folder . '/new');
    //  File::delete(trim($path, '/'));
    //  File::deleteDirectory($this->folder . '/new');
    //  File::exists($this->folder . '/new'))

}















