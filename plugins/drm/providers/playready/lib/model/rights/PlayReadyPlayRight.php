<?php
/**
* @package plugins.drm
* @subpackage model
*/
class PlayReadyPlayRight extends PlayReadyRight
{	
	/**
	 * Minimum Analog Television Output Protection Level:	100, 150, 200
	 * @var PlayReadyAnalogVideoOPL
	 */
	private $analogVideoOPL ;
	
	/**
	 * @var array
	 */
	private $analogVideoOutputProtectionList ;
	
    /**
     * Minimum Compressed Digital Audio Output Protection Level:	100, 150, 200, 250, 300
	 * @var PlayReadyDigitalAudioOPL
	 */
	private $compressedDigitalAudioOPL ;
	
    /**
     * Minimum Compressed Digital Video Output Protection Level:	400, 500
	 * @var PlayReadyCompressedDigitalVideoOPL
	 */
	private $compressedDigitalVideoOPL ;

	/**
	 * Explicit Analog Video Output Protection 
	 * Video Output Protection ID Field			| Binary Configuration Data Field	| Output Protection Description
	 * --------------------------------------------------------------------------------------------------------------------
	 * {C3FD11C6-F8B7-4D20-B008-1DB17D61F2DA}	| 0, 1, 2, 3						| AGC and Color Stripe
	 * {2098DE8D-7DDD-4BAB-96C6-32EBB6FABEA3}	| 0, 1, 2, 3						| Explicit Analog Television Output Restriction
	 * {225CD36F-F132-49EF-BA8C-C91EA28E4369}	| 0, 1, 2, 3						| Best Effort Explicit Analog Television Output Restriction
	 * {811C5110-46C8-4C6E-8163- C0482A15D47E}	| 520000							| Image constraint for Analog Component Video Output
	 * {D783A191-E083-4BAF-B2DA-E69F910B3772}	| 520000							| Image constraint for Analog Computer Monitor Output 
	 * {760AE755-682A-41E0-B1B3-DCDF836A7306}	| 0									| Digital Video Only Content
	 * 
	 * @var array
	 */
	private $digitalAudioOutputProtectionList; 
	
	/**
	 * Minimum Uncompressed Digital Audio Output Protection Level:	100, 150, 200, 250, 300
	 * @var PlayReadyDigitalAudioOPL
	 */	
	private $uncompressedDigitalAudioOPL;

    /**
     * Minimum Uncompressed Digital Video Output Protection Level:	100, 250, 270, 300
	 * @var PlayReadyUncompressedDigitalVideoOPL
	 */
	private $uncompressedDigitalVideoOPL; 
	
    /**
	 * @var int
	 */
	private $firstPlayExpiration;
	
    /**
     * {786627D8-C2A6-44BE-8F88-08AE255B01A7} - unknown
	 * {D685030B-0F4F-43A6-BBAD-356F1EA0049A} - DTCP
	 * {002F9772-38A0-43E5-9F79-0F6361DCC62A} - Helix
	 * {A340C256-0941-4D4C-AD1D-0B6735C0CB24} - HDCP
	 * {1B4542E3-B5CF-4C99-B3BA-829AF46C92F8} - WiVu
	 * {5ABF0F0D-DC29-4B82-9982-FD8E57525BFC}  - AirPlay
	 * 
	 * @var string
	 */
	private $playEnablers;
	
	/**
	 * @return the $analogVideoOPL
	 */
	public function getAnalogVideoOPL() {
		return $this->analogVideoOPL;
	}

	/**
	 * @return the $analogVideoOutputProtectionList
	 */
	public function getAnalogVideoOutputProtectionList() {
		return $this->analogVideoOutputProtectionList;
	}

	/**
	 * @return the $compressedDigitalAudioOPL
	 */
	public function getCompressedDigitalAudioOPL() {
		return $this->compressedDigitalAudioOPL;
	}

	/**
	 * @return the $compressedDigitalVideoOPL
	 */
	public function getCompressedDigitalVideoOPL() {
		return $this->compressedDigitalVideoOPL;
	}

	/**
	 * @return the $digitalAudioOutputProtectionList
	 */
	public function getDigitalAudioOutputProtectionList() {
		return $this->digitalAudioOutputProtectionList;
	}

	/**
	 * @return the $uncompressedDigitalAudioOPL
	 */
	public function getUncompressedDigitalAudioOPL() {
		return $this->uncompressedDigitalAudioOPL;
	}

	/**
	 * @return the $uncompressedDigitalVideoOPL
	 */
	public function getUncompressedDigitalVideoOPL() {
		return $this->uncompressedDigitalVideoOPL;
	}

	/**
	 * @return the $firstPlayExpiration
	 */
	public function getFirstPlayExpiration() {
		return $this->firstPlayExpiration;
	}

	/**
	 * @return the $playEnablers
	 */
	public function getPlayEnablers() {
		return $this->playEnablers;
	}

	/**
	 * @param int $analogVideoOPL
	 */
	public function setAnalogVideoOPL($analogVideoOPL) {
		$this->analogVideoOPL = $analogVideoOPL;
	}

	/**
	 * @param array $analogVideoOutputProtectionList
	 */
	public function setAnalogVideoOutputProtectionList($analogVideoOutputProtectionList) {
		$this->analogVideoOutputProtectionList = $analogVideoOutputProtectionList;
	}

	/**
	 * @param int $compressedDigitalAudioOPL
	 */
	public function setCompressedDigitalAudioOPL($compressedDigitalAudioOPL) {
		$this->compressedDigitalAudioOPL = $compressedDigitalAudioOPL;
	}

	/**
	 * @param int $compressedDigitalVideoOPL
	 */
	public function setCompressedDigitalVideoOPL($compressedDigitalVideoOPL) {
		$this->compressedDigitalVideoOPL = $compressedDigitalVideoOPL;
	}

	/**
	 * @param array $digitalAudioOutputProtectionList
	 */
	public function setDigitalAudioOutputProtectionList($digitalAudioOutputProtectionList) {
		$this->digitalAudioOutputProtectionList = $digitalAudioOutputProtectionList;
	}

	/**
	 * @param int $uncompressedDigitalAudioOPL
	 */
	public function setUncompressedDigitalAudioOPL($uncompressedDigitalAudioOPL) {
		$this->uncompressedDigitalAudioOPL = $uncompressedDigitalAudioOPL;
	}

	/**
	 * @param int $uncompressedDigitalVideoOPL
	 */
	public function setUncompressedDigitalVideoOPL($uncompressedDigitalVideoOPL) {
		$this->uncompressedDigitalVideoOPL = $uncompressedDigitalVideoOPL;
	}

	/**
	 * @param int $firstPlayExpiration
	 */
	public function setFirstPlayExpiration($firstPlayExpiration) {
		$this->firstPlayExpiration = $firstPlayExpiration;
	}

	/**
	 * @param string $playEnablers
	 */
	public function setPlayEnablers($playEnablers) {
		$this->playEnablers = $playEnablers;
	}
}