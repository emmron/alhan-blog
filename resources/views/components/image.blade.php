<picture>
  <!-- <source 
    data-srcset="{{ $image->small }} 320w,
            {{ $image->medium }} 480w,
            {{ $image->large }} 640w" 
    type="image/webp"> -->
    <source 
    data-srcset="{{ $image->small }} 320w,
            {{ $image->medium }} 480w,
            {{ $image->large }} 640w"
     type="image/jpeg">
  <img class="lazy" 
      src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAEsCAQAAACoWRFeAAAAE0lEQVR42mOc+Z9xFI2iUTRwCAB+cN9cxS4fWwAAAABJRU5ErkJggg==" 
      data-srcset="{{ $image->small }} 320w,
            {{ $image->medium }} 480w,
            {{ $image->large }} 640w" 
        data-src="{{ $image->large }}" alt="{{ $image->alt }}">
    <div class="small">{{ $image->alt }}</div>
</picture>