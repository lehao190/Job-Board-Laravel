<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\JobRepositoryInterface;

class JobController extends Controller
{
    private JobRepositoryInterface $jobRepository;

    public function __construct(
        JobRepositoryInterface $jobRepository
    ) {
        $this->jobRepository = $jobRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->jobRepository->getAll();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->jobRepository->get($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
