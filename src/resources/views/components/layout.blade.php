@php use Illuminate\Support\Facades\Auth; @endphp
<!doctype html>
<html lang="ja">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<title>{{ $title ?? 'つぶやきアプリ' }}</title>
@stack('css')
<body class="bg-gray-50">
  {{ $slot }}
</body>
</html>
