<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'RustHub Docs' ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font: Fira Code (The Developer Font) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600&family=Fira+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Prism JS Theme (Tomorrow Night - Dark) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />

    <style>
        :root {
            --rust-bg: #1f2428; /* VSCode Dark Dimmed vibe */
            --rust-sidebar: #24292e;
            --rust-text: #e1e4e8;
            --rust-accent: #ce412b; /* The Rust Logo Red/Orange */
            --rust-code-bg: #2d333b;
        }
        
        body {
            background-color: var(--rust-bg);
            color: var(--rust-text);
            font-family: 'Fira Sans', sans-serif;
        }

        /* Nav */
        .navbar {
            background-color: var(--rust-sidebar) !important;
            border-bottom: 2px solid var(--rust-accent);
        }
        .navbar-brand {
            font-family: 'Fira Code', monospace;
            font-weight: 700;
            color: #fff !important;
        }
        .navbar-brand span { color: var(--rust-accent); }

        /* Typography */
        h1, h2, h3, h4, h5, h6 {
            color: #fff;
            font-weight: 600;
            margin-top: 1.5rem;
        }
        
        a { color: #58a6ff; text-decoration: none; }
        a:hover { text-decoration: underline; color: #79c0ff; }

        /* Cards & Containers */
        .card {
            background-color: var(--rust-sidebar);
            border: 1px solid #444c56;
            color: var(--rust-text);
        }
        .card-header {
            background-color: #2d333b;
            border-bottom: 1px solid #444c56;
            font-family: 'Fira Code', monospace;
            font-size: 0.9rem;
        }

        /* Code Blocks */
        pre {
            background-color: var(--rust-code-bg);
            border-radius: 6px;
            border: 1px solid #444c56;
            padding: 1rem;
        }
        code {
            font-family: 'Fira Code', monospace;
            color: #ff7b72;
        }

        /* Buttons */
        .btn-rust {
            background-color: var(--rust-accent);
            color: white;
            border: none;
            font-weight: 500;
        }
        .btn-rust:hover {
            background-color: #b33522;
            color: white;
        }

        /* Sidebar */
        .sidebar-link {
            display: block;
            padding: 8px 12px;
            color: var(--rust-text);
            border-radius: 4px;
            margin-bottom: 4px;
        }
        .sidebar-link:hover {
            background-color: #3e4451;
            text-decoration: none;
        }
        .sidebar-link.active {
            background-color: rgba(206, 65, 43, 0.2);
            color: var(--rust-accent);
            border-left: 3px solid var(--rust-accent);
        }
    </style>
</head>
<body>
