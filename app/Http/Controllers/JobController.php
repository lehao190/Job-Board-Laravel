<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\JobRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class JobController extends Controller
{
    private JobRepositoryInterface $jobRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(
        JobRepositoryInterface $jobRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->jobRepository = $jobRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->userRepository->get(2);
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
        //
        return 'Job details '.$id;
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
