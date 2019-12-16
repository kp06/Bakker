<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Config;

class ConfigController extends Controller
{
    public function addConfiguration()
    {
        return view('Admin.Bakery.Configuration.addConfig');
    }
    public function createConfiguration(Request $request)
    {

        Config::create([
            'key' => $request->get('key'),
            'value' => $request->get('val'),
            'type' => $request->get('type'),
        ]);
        $request->session()->flash('success-message', 'Configuration added successfully');
        return redirect()->back();
    }
    public function showConfiguration()
    {
        $config = Config::orderBy('id', 'asc')->get();
        return view('Admin.Bakery.Configuration.showConfiguration', ['config' => $config]);
    }
    public function showEditConfiguration($id)
    {
        $config = Config::findOrFail($id);
        return view('Admin.Bakery.Configuration.showEditConfiguration', ['config' => $config]);
    }
    public function updateConfiguration(Request $request, $id)
    {
        $config = Config::findOrFail($id);
        $config->update([
            'key' => $request->get('key'),
            'value' => $request->get('val'),
            'type' => $request->get('type'),
       ]);
        $request->session()->flash('success-message', 'Configuration updated successfully');
        return redirect()->back();
    }
    public function deleteConfiguration(Request $request,$id)
    {
        $this->authorize('delete');
$config= Config::findOrFail($id);

$config->delete();

$request->session()->flash('success-message', 'configuration deleted successfully');
return redirect()->back();
    }
}
