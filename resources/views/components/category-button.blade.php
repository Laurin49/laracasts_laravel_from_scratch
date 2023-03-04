@props(['category'])
<a href="/categories/{{ $category->slug }}" style="font-size: 10px"
   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold">
    {{ $category->name }}
</a>
