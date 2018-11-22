<?php
/**
 * Created by PhpStorm.
 * User: Vivify
 * Date: 11/19/18
 * Time: 9:16 AM
 */

namespace App\Interfaces;


use Illuminate\Http\Request;

interface ITaskRepository
{
    public function index();
    public function store(Request $request);
    public function show($id);
    public function edit($id);
    public function update(Request $request, $id);
    public function destroy($id);
}