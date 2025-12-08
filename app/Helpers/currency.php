<?php

if (! function_exists('current_currency_rate')) {
    function current_currency_rate()
    {
        return session('currency.rate', 1);  // default THB
    }
}

if (! function_exists('current_currency_code')) {
    function current_currency_code()
    {
        return session('currency.code', 'THB');
    }
}

if (! function_exists('current_currency_symbol')) {
    function current_currency_symbol()
    {
        return session('currency.symbol', '฿');
    }
}

if (! function_exists('convert_price')) {
    // Convert THB price to selected currency
    function convert_price($amountThb)
    {
        return $amountThb * current_currency_rate();
    }
}

if (! function_exists('display_price')) {
    // THB → Selected currency + formatting
    function display_price($amountThb, $decimals = 0)
    {
        $converted = convert_price($amountThb);

        return current_currency_symbol()
            . ' '
            . number_format($converted, $decimals)
            . ' '
            . current_currency_code();
    }
}
