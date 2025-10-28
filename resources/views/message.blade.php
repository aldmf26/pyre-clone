<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Secret Message - Pyre Clone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Background gradasi & tekstur */
        body {
            background: radial-gradient(circle at bottom left, #1a1a1a, #0f172a);
            background-image: radial-gradient(circle at bottom left, #1a1a1a, #0f172a),
                url("https://grainy-gradients.vercel.app/noise.svg");
            background-size: cover;
            overflow: hidden;
        }
    </style>
</head>

<body class="flex flex-col items-center justify-center min-h-screen text-white px-4 relative">

    <!-- Logo -->
    <span class="text-sm font-extrabold text-gray-400 tracking-wide mb-2">
        Clone
    </span>
    <h1 class="text-6xl font-extrabold text-orange-400 tracking-wide mb-6">
        PYRE<span class="text-orange-500">'</span>
    </h1>

    <!-- Card -->
    <div
        class="bg-gray-800/50 backdrop-blur-sm border border-gray-700 p-8 rounded-2xl shadow-lg w-full max-w-2xl text-center">
        <h2 class="text-2xl font-bold mb-4">📩 Pesan Rahasia</h2>

        <div class="bg-gray-900/60 border border-gray-700 p-5 rounded-xl text-lg leading-relaxed text-gray-100">
            {{ $message }}
        </div>

        <p class="text-sm text-gray-400 mt-5">
            Pesan ini telah dihapus dari server setelah kamu membacanya.
        </p>

        <a href="/" class="mt-6 inline-block text-orange-400 hover:text-orange-300 font-semibold transition">
            ← Kembali ke halaman utama
        </a>
    </div>

</body>

</html>
