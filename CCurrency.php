<?php 

class CCurrency
{	
	public $startdate = '2021-1-1';
	public $enddate;
	public function __construct()
	{
		$this->enddate = date("Y-m-d" ,time());
	}
	public function GetRates($startdate, $enddate, $CurID)
	{
		$request = 'https://www.nbrb.by/api/exrates/rates/dynamics/'.$CurID.'?startdate='.$startdate.'&enddate='.$enddate;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $request);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$output = json_decode(curl_exec($ch));
		curl_close($ch);
		foreach ($output as $rate) {
			$date = explode('T', $rate->Date);
			$arrResult[] = array(
				'date' => $date[0],
				'value' => $rate->Cur_OfficialRate,
			);
		}
		return $arrResult;
	}
}

?>