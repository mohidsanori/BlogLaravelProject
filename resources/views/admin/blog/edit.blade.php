<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.blog.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Blog Index</a>
                </div>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin.blog.update', $blog->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Blog Heading
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="heading" value="{{ $blog->heading }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Slug
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="slug" value="{{ $blog->slug }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Description
                                </label>
                                <div class="mt-1">
                                    <textarea type="text" id="name" rows="5" name="description"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{ $blog->description }}</textarea>
                                </div>
                                @error('name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Images
                                </label>
                                <div class="mt-1">
                                    <input type="file" id="name" name="image"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Category
                                </label>
                                <div class="mt-1">
                                    <select name="category_id" id="name" required
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />>
                                    <option value="">-- Select Category --</option>
                                    @foreach ($category as $catitems)
                                        <option value="{{ $catitems->id }}"
                                            {{ $blog->category_id == $catitems->id ? 'selected' : '' }}>
                                            {{ $catitems->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @error('name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit"
                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
