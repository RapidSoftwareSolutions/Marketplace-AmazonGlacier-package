<?php

$app->post('/api/AmazonGlacier/createJob', function ($request, $response, $args) {

    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'region', 'vaultName','type']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $credentials = new Aws\Credentials\Credentials($post_data['args']['apiKey'], $post_data['args']['apiSecret']);

    $client = new Aws\Glacier\GlacierClient([
        'version' => 'latest',
        'region' => $post_data['args']['region'],
        'credentials' => $credentials
    ]);

    $body['vaultName'] = $post_data['args']['vaultName'];
    $body['jobParameters']['Type'] = $post_data['args']['type'];
    if (!empty($post_data['args']['accountId'])) {
        $body['accountId'] = $post_data['args']['accountId'];
    }
    if (!empty($post_data['args']['archiveId'])) {
        $body['jobParameters']['ArchiveId'] = $post_data['args']['archiveId'];
    }
    if (!empty($post_data['args']['description'])) {
        $body['jobParameters']['Description'] = $post_data['args']['description'];
    }
    if (!empty($post_data['args']['format'])) {
        $body['jobParameters']['Format'] = $post_data['args']['format'];
    }
    if (!empty($post_data['args']['retrievalByteRange'])) {
        $body['jobParameters']['RetrievalByteRange'] = $post_data['args']['retrievalByteRange'];
    }
    if (!empty($post_data['args']['SNSTopic'])) {
        $body['jobParameters']['SNSTopic'] = $post_data['args']['SNSTopic'];
    }
    if (!empty($post_data['args']['tier'])) {
        $body['jobParameters']['Tier'] = $post_data['args']['tier'];
    }
    if (!empty($post_data['args']['startDate'])) {
        $body['jobParameters']['InventoryRetrievalParameters']['StartDate'] = $post_data['args']['startDate'];
    }
    if (!empty($post_data['args']['endDate'])) {
        $body['jobParameters']['InventoryRetrievalParameters']['EndDate'] = $post_data['args']['endDate'];
    }
    if (!empty($post_data['args']['limit'])) {
        $body['jobParameters']['InventoryRetrievalParameters']['Limit'] = $post_data['args']['limit'];
    }
    if (!empty($post_data['args']['marker'])) {
        $body['jobParameters']['InventoryRetrievalParameters']['Marker'] = $post_data['args']['marker'];
    }

    try {
        $res = $client->initiateJob($body)->toArray();

        $result['callback'] = 'success';
        $result['contextWrites']['to'] = is_array($res) ? $res : json_decode($res);
        if (empty($result['contextWrites']['to'])) {
            $result['contextWrites']['to']['status_msg'] = "Api return no results";
        }
    } catch (Aws\Glacier\Exception\GlacierException $e) {
        // Catch an Glacier specific exception.
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $e->getMessage();
    } catch (\Exception $e) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $e->getMessage();
    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
