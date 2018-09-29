<script>
@php echo Storage::disk('public')->get('/js/yall.js'); @endphp;
// console.log('Default css chars:', document.querySelector('style#default').innerHTML.length);
console.log('Tailwind css chars:', document.querySelector('style#tw').innerHTML.length);
// console.log(document.querySelector('style#tw').innerHTML.length / document.querySelector('style#default').innerHTML.length)
</script>
