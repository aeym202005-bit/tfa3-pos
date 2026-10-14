<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'POS System'); ?></title>
    <style>
        :root {
            --primary: #2c3e50;
            --accent: #27ae60;
            --bg-light: #f4f6f9;
            --text-dark: #333;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        /* Top POS Navigation Bar */
        .pos-navbar {
            background-color: var(--primary);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 24px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
        }

        .pos-brand {
            color: #fff;
            font-size: 1.3rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pos-nav-links {
            display: flex;
            gap: 10px;
        }

        .pos-nav-btn {
            color: #ecf0f1;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 600;
            transition: background 0.2s;
        }

        .pos-nav-btn:hover, .pos-nav-btn.active {
            background-color: var(--accent);
            color: #fff;
        }

        /* Page Container */
        .pos-container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .pos-card {
            background: #fff;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .pos-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 12px;
        }

        .pos-card-title {
            margin: 0;
            font-size: 1.4rem;
            color: var(--primary);
        }

        /* Styled POS Data Table */
        .pos-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .pos-table th {
            background-color: #f8f9fa;
            color: #555;
            text-align: left;
            padding: 12px 16px;
            font-size: 0.9rem;
            border-bottom: 2px solid #dee2e6;
        }

        .pos-table td {
            padding: 12px 16px;
            border-bottom: 1px solid #e9ecef;
            font-size: 0.95rem;
        }

        .pos-table tbody tr:hover {
            background-color: #f1f8f5;
        }

        .badge-role {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .pos-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .pos-table th {
            background-color: #2c3e50;
            color: #ffffff;
            text-align: left;
            padding: 14px 16px;
            font-size: 0.9rem;
        }

        .pos-table td {
            padding: 14px 16px;
            border-bottom: 1px solid #e9ecef;
            font-size: 0.95rem;
            color: #333;
        }

        .pos-table tbody tr:hover {
            background-color: #f1f8f5;
        }
    </style>
</head>
<body>

    <header class="pos-navbar">
        <div class="pos-brand">
            🖥️ POS Admin Terminal
        </div>
        <nav class="pos-nav-links">
            <a href="<?= site_url('/') ?>" class="pos-nav-btn">🏠 Home</a>
            <a href="<?= site_url('customers') ?>" class="pos-nav-btn">👥 Customers</a>
            <a href="<?= site_url('users') ?>" class="pos-nav-btn">🔐 User Accounts</a>
            <a href="<?= site_url('about') ?>" class="pos-nav-btn">ℹ️ About</a>
        </nav>
    </header>

    <main class="pos-container">