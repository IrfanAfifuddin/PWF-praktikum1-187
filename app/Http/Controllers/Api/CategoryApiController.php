<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryApiController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'message' => 'Categories retrieved successfully',
            'data' => $categories
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255'
            ]);

            $category = Category::create($validated);

            Log::info('Menambah data kategori', ['category' => $category]);

            return response()->json([
                'message' => 'Kategori berhasil ditambahkan!!',
                'data' => $category
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Error saat menambah kategori', [
                'message' => $e->getMessage(),
            ]);
            return response()->json([
                'message' => 'Gagal menambahkan kategori',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Category tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'message' => 'Category retrieved successfully',
            'data' => $category
        ], 200);
    }

    public function update(Request $request, int $id)
    {
        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'message' => 'Category tidak ditemukan',
                ], 404);
            }

            $validated = $request->validate([
                'name' => 'required|string|max:255'
            ]);

            $category->update($validated);

            Log::info('Mengubah data kategori', ['category' => $category]);

            return response()->json([
                'message' => 'Kategori berhasil diubah!!',
                'data' => $category
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat mengubah kategori', [
                'message' => $e->getMessage(),
            ]);
            return response()->json([
                'message' => 'Gagal mengubah kategori',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'message' => 'Category tidak ditemukan',
                ], 404);
            }

            $category->delete();

            Log::info('Menghapus data kategori', ['id' => $id]);

            return response()->json([
                'message' => 'Kategori berhasil dihapus',
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat menghapus kategori', [
                'message' => $e->getMessage(),
            ]);
            return response()->json([
                'message' => 'Gagal menghapus kategori',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
