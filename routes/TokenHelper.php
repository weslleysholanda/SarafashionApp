<?php

class TokenHelper
{
    private const SECRET_KEY = 'SarafashionAPP';

    /**
     * Gera um token assinado com HMAC-SHA256
     */
    public static function gerar(array $dados): string
    {
        $payload = base64_encode(json_encode($dados));
        $assinatura = hash_hmac('sha256', $payload, self::SECRET_KEY);
        return $payload . '.' . $assinatura;
    }

    /**
     * Valida o token assinado
     */
    public static function validar(string $token): ?array
    {
        if (empty($token) || strpos($token, '.') === false) {
            return null; // Token incompleto ou malformado
        }

        [$payloadBase64, $assinaturaRecebida] = explode('.', $token, 2);

        // Verifica se base64 está válido
        $payloadJson = base64_decode($payloadBase64, true);
        if ($payloadJson === false) {
            return null; // base64 inválido
        }

        // Verifica assinatura
        $assinaturaEsperada = hash_hmac('sha256', $payloadBase64, self::SECRET_KEY);
        if (!hash_equals($assinaturaEsperada, $assinaturaRecebida)) {
            return null; // Assinatura não bate
        }

        // Decodifica payload em array
        $dados = json_decode($payloadJson, true);
        if (!is_array($dados)) {
            return null; // Payload não é JSON válido
        }

        // Verifica expiração, se existir
        if (isset($dados['exp']) && time() > $dados['exp']) {
            return null; // Token expirado
        }

        return $dados;
    }
}
