<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('send_wa')) {
	function send_wa($phone, $message)
	{
		$CI = &get_instance();
		$CI->load->model('Setting_model');
		$token = $CI->Setting_model->get_value('wa_api_key');

		if (empty($token)) {
			log_message('error', 'WA Status: API Token is empty.');
			return false;
		}

		// Clean phone number
		$phone = preg_replace('/[^0-9]/', '', $phone);

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.fonnte.com/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array(
				'target' => $phone,
				'message' => $message,
				'countryCode' => '62',
			),
			CURLOPT_HTTPHEADER => array(
				"Authorization: " . trim($token)
			),
		));

		$response = curl_exec($curl);
		if (curl_errno($curl)) {
			$error_msg = curl_error($curl);
			log_message('error', 'WA CURL Error: ' . $error_msg);
		}
		curl_close($curl);

		if (isset($error_msg)) {
			return false;
		}

		log_message('debug', 'WA Response: ' . $response);

		// Final Status Check
		$res_arr = json_decode($response, true);
		if (isset($res_arr['status']) && $res_arr['status'] == false) {
			log_message('error', 'WA API Error: ' . ($res_arr['reason'] ?? 'Unknown error'));
		}

		return $response;
	}
}

if (!function_exists('format_wa_message')) {
	function format_wa_message($template, $data)
	{
		$placeholders = [
			'{invoice}' => $data['invoice'] ?? '',
			'{customer}' => $data['customer'] ?? '',
			'{estimation}' => $data['estimation'] ?? '',
			'{total}' => $data['total'] ?? '',
		];

		return strtr($template, $placeholders);
	}
}
