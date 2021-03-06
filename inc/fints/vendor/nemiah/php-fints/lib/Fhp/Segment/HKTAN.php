<?php

namespace Fhp\Segment;

/**
 * Class HKTAN (Zwei-Schritt-TAN-Einreichung)
 * Segment type: Geschäftsvorfall
 *
 * @link: https://www.hbci-zka.de/dokumente/spezifikation_deutsch/fintsv3/FinTS_3.0_Security_Sicherheitsverfahren_PINTAN_Rel_20101027_final_version.pdf
 * Section: B.4.5.1.1.1
 *
 * @author Nena Furtmeier <support@furtmeier.it>
 * @package Fhp\Segment
 */
class HKTAN extends AbstractSegment
{
	const NAME = 'HKTAN';
	const VERSION = 6;

	/**
	 * HKCDL constructor.
	 * @param int $version
	 * @param int $segmentNumber
	 */
	public function __construct($version, $segmentNumber, $processID = null, $tanMediaName = '')
	{
		$tanProcess = null !== $processID ? 2 : 4;
		$segmentIdent = null === $processID ? 'HKIDN' : '';
		$data = array(
			$tanProcess,
			$segmentIdent,
			'',
			'',
			$version == 6 ? $processID : '',
			$version != 6 ? $processID : '',
			'N', // 7 Weitere TAN folgt
			'',
			'',
			'',
			$tanMediaName // 12 Bezeichnung des TAN-Mediums - mandatory bei TAN-Prozess=1, 3, 4  und „Anzahl unterstützter aktiver TAN-Medien“ > 1 und „Bezeichnung des TAN-Mediums erforderlich“=2
		);
		parent::__construct(
			static::NAME,
			$segmentNumber,
			$version,
			$data
		);
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return static::NAME;
	}
}
