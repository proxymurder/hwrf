<?php

// namespace App\Http\Controllers\OAuth;

// use Illuminate\Support\Str;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use Laravel\Passport\TokenRepository;
// use Laravel\Passport\ClientRepository;
// use Psr\Http\Message\ServerRequestInterface;
// use Laravel\Passport\Http\Controllers\AuthorizationController as PassportAuthorizationController;

// class AuthorizationController extends PassportAuthorizationController
// {
//     /**
//      * Authorize a client to access the user's account.
//      *
//      * @param  \Psr\Http\Message\ServerRequestInterface  $psrRequest
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Laravel\Passport\ClientRepository  $clients
//      * @param  \Laravel\Passport\TokenRepository  $tokens
//      * @return \Illuminate\Http\Response
//      */
//     public function authorize(
//         ServerRequestInterface $psrRequest,
//         Request $request,
//         ClientRepository $clients,
//         TokenRepository $tokens
//     ) {
//         $authRequest = $this->withErrorHandling(function () use ($psrRequest) {
//             return $this->server->validateAuthorizationRequest($psrRequest);
//         });

//         $scopes = $this->parseScopes($authRequest);

//         $user = $request->user();
//         $client = $clients->find($authRequest->getClient()->getIdentifier());
//         // $token = $tokens->findValidToken();

//         $token = $client->tokens()
//             ->whereUserId($user->getAuthIdentifier())
//             // ->where('revoked', 0)
//             ->latest('expires_at')
//             ->first();

//         if (($token && $token->scopes === collect($scopes)->pluck('id')->all()) ||
//             $client->skipsAuthorization()
//         ) {
//             return $this->approveRequest($authRequest, $user);
//         }

//         $request->session()->put('authToken', $authToken = Str::random());
//         $request->session()->put('authRequest', $authRequest);

//         return $this->response->view('passport::authorize', [
//             'client' => $client,
//             'user' => $user,
//             'scopes' => $scopes,
//             'request' => $request,
//             'authToken' => $authToken,
//         ]);
//     }
// }