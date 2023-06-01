<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editer {{$post->titre}}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="my-10">

        @foreach ($errors->all() as $error )
            <span class="block text-red-500">{{ $error }}</span>
        @endforeach

    </div>

    <form action="{{ route('posts.update',$post)}}" method="post" enctype="multipart/form-data"  class=" block mt-10 ">

        @method('put')
        @csrf

        <x-input-label for="titre" value="Titre du poste"/>
        <br>
        <x-text-input id="titre" type="text" name="titre" value='{{$post->titre}}'/>  

        <x-input-label for="contenue" value="Contenue du poste" />
        <textarea name="contenue" id="contenue"> {{$post->contenue}}</textarea><br>

        <x-input-label for="image" value="Image du poste" />
        <x-text-input id="image" type="file" name="image" class="mt-5" />

        <x-input-label for="category" class="mt-5" value="Category du poste" />

        <select name="category" id="category">
            @foreach ($categories as $category )
                <option value="{{$category -> id}}" {{$post->category_id == $category->id ? 'selected' : ''}}> {{ $category -> name}}</option>  
            @endforeach
        </select>   

        <x-primary-button style="display:block !important;" class="mt-3">Editer le poste</x-primary-button>


    </form>

    </div>
    
</x-app-layout>