<?php
/**
 * Created by PhpStorm.
 * User: Vivify
 * Date: 11/15/18
 * Time: 9:43 AM
 */

namespace App\Interfaces;


use Illuminate\Http\Request;

interface IUserRepository
{
    public function index();
    public function create();
    public function store(Request $request);
    public function show($id);
    public function edit($id);
    public function update(Request $request, $id);
    public function destroy($id);
}