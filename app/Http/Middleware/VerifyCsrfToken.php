<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'payment_success',
        'payment_failure',
        'payment_cancel',
    ];
    public function handle($request, Closure $next)
    {
        try {
            return parent::handle($request, $next);
        }
        catch (TokenMismatchException $exception) {
            return redirect()->back()->withErrors([
                'message' => 'Your Session have expired. Try again.',
            ]);
        }
    }
}