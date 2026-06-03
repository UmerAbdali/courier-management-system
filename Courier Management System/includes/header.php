<?php
// Common header for Courier Management System pages
$currentDir = basename(dirname($_SERVER['SCRIPT_NAME']));
$bodyClass = $currentDir === 'admin' ? 'admin-bg' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier Management System</title>
    <style>
        :root {
            --bg: #fff7ed;
            --surface: #ffffff;
            --surface-soft: #fff1e0;
            --border: rgba(249, 115, 22, 0.25);
            --text: #1f2937;
            --muted: #475569;
            --accent: #f97316;
            --accent-soft: rgba(249, 115, 22, 0.18);
            --success: #16a34a;
            --danger: #dc2626;
            --shadow: 0 22px 50px rgba(15, 23, 42, 0.08);
        }

        * {
            box-sizing: border-box;
        }

        html {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background: radial-gradient(circle at top, #fff7ed 0%, #ffe7d9 45%, #fff1c7 100%);
            color: var(--text);
        }

        body {
            margin: 0;
            min-height: 100vh;
            line-height: 1.6;
            background: var(--bg);
        }

        body.admin-bg {
            background: linear-gradient(rgba(255, 247, 237, 0.94), rgba(255, 243, 232, 0.98)), url('warehouse-bg.svg') center top/cover no-repeat fixed;
        }

        header {
            padding: 28px 32px;
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid rgba(249, 115, 22, 0.18);
            backdrop-filter: blur(12px);
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: clamp(2rem, 2.8vw, 3rem);
            letter-spacing: -0.04em;
        }

        main {
            max-width: 1100px;
            margin: 24px auto 40px;
            padding: 0 18px 32px;
        }

        .page-card {
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(249, 115, 22, 0.18);
            box-shadow: var(--shadow);
            border-radius: 24px;
            padding: 38px;
            backdrop-filter: blur(12px);
        }

        h2 {
            margin-top: 0;
            color: #1f2937;
            font-size: 1.95rem;
        }

        form {
            max-width: 760px;
            margin: 0 auto 24px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(249, 115, 22, 0.18);
            border-radius: 20px;
        }

        label {
            display: block;
            margin: 16px 0 8px;
            font-weight: 700;
            color: #475569;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid rgba(148, 163, 184, 0.5);
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.95);
            color: #1f2937;
            font-size: 1rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
        }

        input::placeholder,
        textarea::placeholder {
            color: rgba(71, 85, 105, 0.45);
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--accent);
            background: rgba(249, 115, 22, 0.08);
            outline: none;
            box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.12);
        }

        button,
        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 24px;
            border: 1px solid transparent;
            border-radius: 999px;
            background: linear-gradient(120deg, #fb923c 0%, #f97316 100%);
            color: white;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
            text-decoration: none;
        }

        button:hover,
        .button:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 30px rgba(249, 115, 22, 0.22);
        }

        button:disabled,
        .button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 24px;
            justify-content: center;
        }

        nav a {
            display: inline-flex;
            align-items: center;
            padding: 10px 18px;
            border-radius: 999px;
            background: rgba(249, 115, 22, 0.08);
            color: #334155;
            text-decoration: none;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        nav a:hover {
            background: rgba(249, 115, 22, 0.18);
            color: #1f2937;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
            border-radius: 18px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 24px 45px rgba(15, 23, 42, 0.08);
        }

        th,
        td {
            padding: 16px 18px;
            text-align: left;
            border-bottom: 1px solid rgba(148, 163, 184, 0.24);
            color: #1f2937;
        }

        th {
            background: rgba(254, 242, 235, 0.95);
            font-weight: 700;
        }

        tr:nth-child(even) {
            background: rgba(249, 115, 22, 0.05);
        }

        tr:last-child td {
            border-bottom: none;
        }

        footer {
            text-align: center;
            color: #475569;
            font-size: 0.95rem;
            padding: 18px 0 24px;
        }

        .alert {
            padding: 18px 22px;
            margin: 20px 0;
            border-radius: 18px;
            background: rgba(249, 115, 22, 0.12);
            color: #1f2937;
            border: 1px solid rgba(249, 115, 22, 0.28);
        }

        @media (max-width: 780px) {
            header {
                padding: 20px 16px;
            }

            main {
                margin: -30px auto 24px;
                padding: 0 12px 24px;
            }

            .page-card,
            form {
                padding: 24px;
            }

            h1 {
                font-size: 1.8rem;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body class="<?php echo $bodyClass; ?>">
    <header>
        <h1>Courier Management System</h1>
    </header>
    <main class="page-card">
