<div class='mt-3 mb-3'>
<picture>
  <!-- <source 
    data-srcset='{{ $image->sm }} 320w,
            {{ $image->md }} 480w,
            {{ $image->lg }} 640w' 
    type='image/webp'> -->
    <source 
    data-srcset='{{ $image->sm }} 320w,
            {{ $image->md }} 480w,
            {{ $image->lg }} 640w'
     type='image/jpeg'>
  <img class='lazy mb-1' 
      src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mOc+R8AAjcBmvywMWoAAAAASUVORK5CYII=' 
      data-srcset='{{ $image->sm }} 320w,
            {{ $image->md }} 480w,
            {{ $image->lg }} 640w' 
        data-src='{{ $image->lg }}' alt='{{ $image->alt_text }}'>
</picture>
<div class='sm'>{{ $image->alt_text }}</div>
</div>