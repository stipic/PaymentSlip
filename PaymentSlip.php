<?php
use BigFish\PDF417\PDF417;
use BigFish\PDF417\Renderers\ImageRenderer;

/**
 * Author: Kristijan Stipić
 *
 * PaymentSlip Class
 */


class PaymentSlip extends PDF417
{
	/**
	 * [$_intend_codes description]
	 * @var array
	 */
	private $_intend_codes = array(
		"ADMG", //title: "Administracija" },
		"GVEA", //title: "Austrijski državni zaposlenici, Kategorija A" },
		"GVEB", //title: "Austrijski državni zaposlenici, Kategorija B" },
		"GVEC", //title: "Austrijski državni zaposlenici, Kategorija C" },
		"GVED", //title: "Austrijski državni zaposlenici, Kategorija D" },
		"BUSB", //title: "Autobusni" },
		"CPYR", //title: "Autorsko pravo" },
		"HSPC", //title: "Bolnička njega" },
		"RDTX", //title: "Cestarina" },
		"DEPT", //title: "Depozit" },
		"DERI", //title: "Derivati (izvedenice)" },
		"FREX", //title: "Devizno tržište" },
		"CGDD", //title: "Direktno terećenje nastalo kao rezultat kartične transakcije" },
		"DIVD", //title: "Dividenda" },
		"BECH", //title: "Dječji doplatak" },
		"CHAR", //title: "Dobrotvorno plaćanje" },
		"ETUP", //title: "Doplata e-novca" },
		"MTUP", //title: "Doplata mobilnog uređaja (bon)" },
		"GOVI", //title: "Državno osiguranje" },
		"ENRG", //title: "Energenti" },
		"CDCD", //title: "Gotovinska isplata" },
		"CSDB", //title: "Gotovinska isplata" },
		"TCSC", //title: "Gradske naknade" },
		"CDCS", //title: "Isplata gotovine s naknadom" },
		"FAND", //title: "Isplata naknade za elementarne nepogode" },
		"CSLP", //title: "Isplata socijalnih zajmova društava  banci" },
		"RHBS", //title: "Isplata za vrijeme profesionalne rehabilitacije" },
		"GWLT", //title: "Isplata žrtvama rata i invalidima" },
		"ADCS", //title: "Isplate za donacije, sponzorstva, savjetodavne, intelektualne i druge usluge" },
		"PADD", //title: "Izravno terećenje" },
		"INTE", //title: "Kamata" },
		"CDDP", //title: "Kartično plaćanje s odgodom" },
		"CDCB", //title: "Kartično plaćanje uz gotovinski povrat (Cashback)" },
		"BOCE", //title: "Knjiženje konverzije u Back Office-u" },
		"POPE", //title: "Knjiženje mjesta kupnje" },
		"RCKE", //title: "Knjiženje ponovne prezentacije čeka" },
		"AREN", //title: "Knjiženje računa potraživanja" },
		"COMC", //title: "Komercijalno plaćanje" },
		"UBIL", //title: "Komunalne usluge" },
		"COMT", //title: "Konsolidirano plaćanje treće strane za račun potrošača." },
		"SEPI", //title: "Kupnja vrijednosnica (interna)" },
		"GDDS", //title: "Kupovina-prodaja roba" },
		"GSCB", //title: "Kupovina-prodaja roba i usluga uz gotovinski povrat" },
		"GDSV", //title: "Kupovina/prodaja roba i usluga" },
		"SCVE", //title: "Kupovina/prodaja usluga" },
		"HLTC", //title: "Kućna njega bolesnika" },
		"CBLK", //title: "Masovni kliring kartica" },
		"MDCS", //title: "Medicinske usluge" },
		"NWCM", //title: "Mrežna komunikacija" },
		"RENT", //title: "Najam" },
		"ALLW", //title: "Naknada" },
		"SSBE", //title: "Naknada socijalnog osiguranja" },
		"LICF", //title: "Naknada za licencu" },
		"GFRP", //title: "Naknada za nezaposlene u toku stečaja" },
		"BENE", //title: "Naknada za nezaposlenost/invaliditet" },
		"CFEE", //title: "Naknada za poništenje" },
		"AEMP", //title: "Naknada za zapošljavanje" },
		"COLL", //title: "Naplata" },
		"FCOL", //title: "Naplata naknade po kartičnoj transakciji" },
		"DBTC", //title: "Naplata putem terećenja" },
		"NOWS", //title: "Nenavedeno" },
		"IDCP", //title: "Neopozivo plaćanje sa računa debitne kartice" },
		"ICCP", //title: "Neopozivo plaćanje sa računa kreditne kartice" },
		"BONU", //title: "Novčana nagrada (bonus)." },
		"PAYR", //title: "Obračun plaća" },
		"BLDM", //title: "Održavanje zgrada" },
		"HEDG", //title: "Omeđivanje rizika (Hedging)" },
		"CDOC", //title: "Originalno odobrenje" },
		"PPTI", //title: "Osiguranje imovine" },
		"LBRI", //title: "Osiguranje iz rada" },
		"OTHR", //title: "Ostalo" },
		"CLPR", //title: "Otplata glavnice kredita za automobil" },
		"HLRP", //title: "Otplata stambenog kredita" },
		"LOAR", //title: "Otplata zajma" },
		"ALMY", //title: "Plaćanje alimentacije" },
		"RCPT", //title: "Plaćanje blagajničke potvrde. (ReceiptPayment)" },
		"PRCP", //title: "Plaćanje cijene" },
		"SUPP", //title: "Plaćanje dobavljača" },
		"CFDI", //title: "Plaćanje dospjele glavnice" },
		"GOVT", //title: "Plaćanje države" },
		"PENS", //title: "Plaćanje mirovine" },
		"DCRD", //title: "Plaćanje na račun debitne kartice." },
		"CCRD", //title: "Plaćanje na račun kreditne kartice" },
		"SALA", //title: "Plaćanje plaće" },
		"REBT", //title: "Plaćanje popusta/rabata" },
		"TAXS", //title: "Plaćanje poreza" },
		"VATX", //title: "Plaćanje poreza na dodatnu vrijednost" },
		"RINP", //title: "Plaćanje rata koje se ponavljaju" },
		"IHRP", //title: "Plaćanje rate pri kupnji na otplatu" },
		"IVPT", //title: "Plaćanje računa" },
		"CDBL", //title: "Plaćanje računa za kreditnu karticu" },
		"TREA", //title: "Plaćanje riznice" },
		"CMDT", //title: "Plaćanje roba" },
		"INTC", //title: "Plaćanje unutar društva" },
		"INVS", //title: "Plaćanje za fondove i vrijednosnice" },
		"PRME", //title: "Plemeniti metali" },
		"AGRT", //title: "Poljoprivredni transfer" },
		"INTX", //title: "Porez na dohodak" },
		"PTXP", //title: "Porez na imovinu" },
		"NITX", //title: "Porez na neto dohodak" },
		"ESTX", //title: "Porez na ostavštinu" },
		"GSTX", //title: "Porez na robu i usluge" },
		"HSTX", //title: "Porez na stambeni prostor" },
		"FWLV", //title: "Porez na strane radnike" },
		"WHLD", //title: "Porez po odbitku" },
		"BEXP", //title: "Poslovni troškovi" },
		"REFU", //title: "Povrat" },
		"TAXR", //title: "Povrat poreza" },
		"RIMB", //title: "Povrat prethodne pogrešne transakcije" },
		"OFEE", //title: "Početna naknada (Opening Fee)" },
		"ADVA", //title: "Predujam" },
		"INSU", //title: "Premija osiguranja" },
		"INPC", //title: "Premija osiguranja za vozilo" },
		"TRPT", //title: "Prepaid cestarina (ENC)" },
		"SUBS", //title: "Pretplata" },
		"CASH", //title: "Prijenos gotovine" },
		"PENO", //title: "Prisilna naplata" },
		"COMM", //title: "Provizija" },
		"INSM", //title: "Rata" },
		"ELEC", //title: "Račun za električnu energiju" },
		"CBTV", //title: "Račun za kabelsku TV" },
		"OTLC", //title: "Račun za ostale telekom usluge" },
		"GASB", //title: "Račun za plin" },
		"WTER", //title: "Račun za vodu" },
		"ANNI", //title: "Renta" },
		"BBSC", //title: "Rodiljna naknada" },
		"NETT", //title: "Saldiranje (netiranje)" },
		"CAFI", //title: "Skrbničke naknade (interne)" },
		"STDY", //title: "Studiranje" },
		"ROYA", //title: "Tantijeme" },
		"PHON", //title: "Telefonski račun" },
		"FERB", //title: "Trajektni" },
		"DMEQ", //title: "Trajna medicinska pomagala" },
		"WEBI", //title: "Transakcija inicirana internetom" },
		"TELI", //title: "Transakcija inicirana telefonom" },
		"HREC", //title: "Transakcija se odnosi na doprinos poslodavca za troškove stanovanja" },
		"CBFR", //title: "Transakcija se odnosi na kapitalnu štednju za mirovinu" },
		"CBFF", //title: "Transakcija se odnosi na kapitalnu štednju, općenito" },
		"TRAD", //title: "Trgovinske usluge" },
		"COST", //title: "Troškovi" },
		"CPKC", //title: "Troškovi parkiranja" },
		"TBIL", //title: "Troškovi telekomunikacija" },
		"NWCH", //title: "Troškovi za mrežu" },
		"EDUC", //title: "Troškovi školovanja" },
		"LIMA", //title: "Upravljanje likvidnošću" },
		"ACCT", //title: "Upravljanje računom" },
		"ANTS", //title: "Usluge anestezije" },
		"VIEW", //title: "Usluge oftalmološke skrbi" },
		"LTCF", //title: "Ustanova dugoročne zdravstvene skrbi" },
		"ICRF", //title: "Ustanova socijalne skrbi" },
		"CVCF", //title: "Ustanova za usluge skrbi za rekonvalescente" },
		"PTSP", //title: "Uvjeti plaćanja" },
		"MSVC", //title: "Višestruke vrste usluga" },
		"SECU", //title: "Vrijednosni papiri" },
		"LOAN", //title: "Zajam" },
		"FCPM", //title: "Zakašnjele naknade" },
		"TRFD", //title: "Zaklada" },
		"CDQC", //title: "Zamjenska gotovina" },
		"HLTI", //title: "Zdravstveno osiguranje" },
		"AIRB", //title: "Zračni" },
		"DNTS", //title: "Zubarske usluge" },
		"SAVG", //title: "Štednja"
		"RLWY", //title: "Željeznički"
		"LIFI" //title: "Životno osiguranje"
	);

	/**
	 * [$_countries description]
	 *
	 * Source: https://en.wikipedia.org/wiki/International_Bank_Account_Number
	 * 
	 * @var array
	 */
	private $_countries = array(
		'al' => 28,
		'ad' => 24,
		'at' => 20,
		'az' => 28,
		'bh' => 22,
		'be' => 16,
		'ba' => 20,
		'br' => 29,
		'bg' => 22,
		'cr' => 21,
		'hr' => 21,
		'cy' => 28,
		'cz' => 24,
		'dk' => 18,
		'do' => 28,
		'ee' => 20,
		'fo' => 18,
		'fi' => 18,
		'fr' => 27,
		'ge' => 22,
		'de' => 22,
		'gi' => 23,
		'gr' => 27,
		'gl' => 18,
		'gt' => 28,
		'hu' => 28,
		'is' => 26,
		'ie' => 22,
		'il' => 23,
		'it' => 27,
		'jo' => 30,
		'kz' => 20,
		'kw' => 30,
		'lv' => 21,
		'lb' => 28,
		'li' => 21,
		'lt' => 20,
		'lu' => 20,
		'mk' => 19,
		'mt' => 31,
		'mr' => 27,
		'mu' => 30,
		'mc' => 27,
		'md' => 24,
		'me' => 22,
		'nl' => 18,
		'no' => 15,
		'pk' => 24,
		'ps' => 29,
		'pl' => 28,
		'pt' => 25,
		'qa' => 29,
		'ro' => 24,
		'sm' => 27,
		'sa' => 24,
		'rs' => 22,
		'sk' => 24,
		'si' => 19,
		'es' => 24,
		'se' => 24,
		'ch' => 21,
		'tn' => 24,
		'tr' => 26,
		'ae' => 23,
		'gb' => 22,
		'vg' => 24
	);

	/**
	 * [$_chars description]
	 * @var array
	 */
	private $_chars = array(
		'a' => 10,
		'b' => 11,
		'c' => 12,
		'd' => 13,
		'e' => 14,
		'f' => 15,
		'g' => 16,
		'h' => 17,
		'i' => 18,
		'j' => 19,
		'k' => 20,
		'l' => 21,
		'm' => 22,
		'n' => 23,
		'o' => 24,
		'p' => 25,
		'q' => 26,
		'r' => 27,
		's' => 28,
		't' => 29,
		'u' => 30,
		'v' => 31,
		'w' => 32,
		'x' => 33,
		'y' => 34,
		'z' => 35
	);

	/**
	 * [$_valid_models description]
	 * @var array
	 */
	private $_valid_models = array(
		 "01",
		 "02",
		 "03",
		 "04",
		 "05",
		 "06",
		 "07",
		 "08",
		 "09",
		 "10",
		 "11",
		 "12",
		 "13",
		 "14",
		 "15",
		 "16",
		 "17",
		 "18",
		 "23",
		 "24",
		 "26",
		 "27",
		 "28",
		 "29",
		 "30",
		 "31",
		 "33",
		 "34",
		 "40",
		 "41",
		 "42",
		 "43",
		 "55",
		 "62",
		 "63",
		 "64",
		 "65",
		 "67",
		 "68",
		 "69",
		 "99",
		 "25",
		 "83",
		 "84",
		 "50" 
	);

	/**
	 * [$_header description]
	 * @var string
	 */
	private $_header = "HRVHUB30"; // default

	/**
	 * [$_currency description]
	 * @var string
	 */
	private $_currency = "HRK"; // default

	/**
	 * [$_payment_model_prefix description]
	 * @var string
	 */
	private $_payment_model_prefix = "HR"; // default

	/**
	 * [$_iznos description]
	 * @var [type]
	 */
	private $_iznos;

	/**
	 * [$_platitelj description]
	 * @var [type]
	 */
	private $_platitelj;

	/**
	 * [$_platitelj_adresa description]
	 * @var [type]
	 */
	private $_platitelj_adresa;

	/**
	 * [$_platitelj_sjediste description]
	 * @var [type]
	 */
	private $_platitelj_sjediste;

	/**
	 * [$_primatelj description]
	 * @var [type]
	 */
	private $_primatelj;

	/**
	 * [$_primatelj_adresa description]
	 * @var [type]
	 */
	private $_primatelj_adresa;

	/**
	 * [$_primatelj_sjediste description]
	 * @var [type]
	 */
	private $_primatelj_sjediste;

	/**
	 * [$_iban description]
	 * @var [type]
	 */
	private $_iban;

	/**
	 * [$_model description]
	 * @var [type]
	 */
	private $_model;

	/**
	 * [$_poziv_na_broj description]
	 * @var [type]
	 */
	private $_poziv_na_broj;

	/**
	 * [$_namjena description]
	 * @var [type]
	 */
	private $_namjena;

	/**
	 * [$_opis description]
	 * @var [type]
	 */
	private $_opis;

	/**
	 * [$_delmiter description]
	 * @var string
	 */
	private $_delmiter = '<br />';

	/**
	 * [$_payment_slip_price_spaces description]
	 * @var integer
	 */
	private $_payment_slip_price_spaces = 15;

	// Header
	// Currency
	// Model_Prefix
	// Iznos
	// Platitelj
	// Platitelj_Adresa
	// Platitelj_Sjediste
	// Primatelj
	// Primatelj_Adresa
	// Primatelj_Sjediste
	// IBAN
	// Model
	// Poziv_Na_Broj
	// Namjena
	// Opis
	// Payment_Slip_PS
	public function __construct($params) 
	{

		// MAX LEN
		// Price: 16,
		// PayerName: 30,
		// PayerAddress: 27,
		// PayerHQ: 27,
		// ReceiverName: 25,
		// ReceiverAddress: 25,
		// ReceiverHQ: 27,
		// IBAN: 21,
		// PaymentModel: 2,
		// CalloutNumber: 22,
		// IntentCode: 4,
		// Description: 35
		$this->_header = isset($params['Header']) ? $params['Header'] : $this->_header;
		$this->_currency = isset($params['Currency']) ? $params['Currency'] : $this->_currency;
		$this->_payment_model_prefix = isset($params['Model_Prefix']) ? $params['Model_Prefix'] : $this->_payment_model_prefix;
		$this->_iznos = isset($params['Iznos']) ? $params['Iznos'] : NULL;
		$this->_platitelj = isset($params['Platitelj']) ? $params['Platitelj'] : NULL;
		$this->_platitelj_adresa = isset($params['Platitelj_Adresa']) ? $params['Platitelj_Adresa'] : NULL;
		$this->_platitelj_sjediste = isset($params['Platitelj_Sjediste']) ? $params['Platitelj_Sjediste'] : NULL;
		$this->_primatelj = isset($params['Primatelj']) ? $params['Primatelj'] : NULL;
		$this->_primatelj_adresa = isset($params['Primatelj_Adresa']) ? $params['Primatelj_Adresa'] : NULL;
		$this->_primatelj_sjediste = isset($params['Primatelj_Sjediste']) ? $params['Primatelj_Sjediste'] : NULL;
		$this->_iban = isset($params['IBAN']) ? $params['IBAN'] : NULL;
		$this->_model = isset($params['Model']) ? $params['Model'] : NULL;
		$this->_poziv_na_broj = isset($params['Poziv_Na_Broj']) ? $params['Poziv_Na_Broj'] : NULL;
		$this->_namjena = isset($params['Namjena']) ? $params['Namjena'] : NULL;
		$this->_opis = isset($params['Opis']) ? $params['Opis'] : NULL;
		$this->_payment_slip_price_spaces = isset($params['Payment_Slip_PS']) ? $params['Payment_Slip_PS'] : NULL;

		$this->_check_IBAN();
		$this->_check_model();
		$this->_check_price();
		$this->_check_indend_code();

	}

	/**
	 * [_check_indend_code description]
	 * @return [type] [description]
	 */
	private function _check_indend_code()
	{
		if(!in_array($this->_namjena, $this->_intend_codes))
		{
			throw new \Exception("Indend Code is invalid."); 
		}
		return TRUE;
	}

	/**
	 * [_check_model description]
	 * @return [type] [description]
	 */
	private function _check_model()
	{
		if(!in_array($this->_model, $this->_valid_models)) 
		{
			throw new \Exception("Model is invalid."); 
		}
		return TRUE;
	}

	/**
	 * [_parse_invoice_template description]
	 * @return [type] [description]
	 */
	private function _parse_invoice_template()
	{
		return
			$this->_header .  chr(0x0A) .
			$this->_currency . chr(0x0A) .
			$this->_encode_price() . chr(0x0A) .
			$this->_platitelj .  chr(0x0A) .
			$this->_platitelj_adresa .  chr(0x0A) .
			$this->_platitelj_sjediste .  chr(0x0A) .
			$this->_primatelj . chr(0x0A) .
			$this->_primatelj_adresa . chr(0x0A) .
			$this->_primatelj_sjediste .  chr(0x0A) .
			$this->_iban . chr(0x0A) .
			$this->_payment_model_prefix . $this->_model . chr(0x0A) .
			$this->_poziv_na_broj .  chr(0x0A) .
			$this->_namjena .  chr(0x0A) .
			$this->_opis;
	}

	/**
	 * [get description]
	 * @param  string $returnType [description]
	 * @param  array  $options    [description]
	 * @return [type]             [description]
	 */
	public function get($returnType = 'base64', $options = array()) 
	{
		$payment = $this->_parse_invoice_template();
		$data = $this->encode($payment);
		switch($returnType)
		{
			case 'base64': 
			{
				$renderer = new ImageRenderer([
					'format' => 'png',
					'color' => '#000000',
					'bgColor' => '#FFFFFF',
					'scale' => 2,
				]);
				$image = base64_encode($renderer->render($data));
				break;
			}
		}

		return $image;
	}

	/**
	 * [_check_price description]
	 * @return [type] [description]
	 */
	private function _check_price()
	{
		$price = explode(',', $this->_iznos);
		$base = $price[0];
		$coin = $price[1];
		if(strlen($coin) != 2) 
		{
			throw new \Exception("Price is invalid. Use format: xxxx,xx"); 
		}

		return TRUE;
	}

	/**
	 * [_encode_price description]
	 * @return [type] [description]
	 */
	private function _encode_price()
	{
		return str_pad(str_replace(',', '', $this->_iznos), $this->_payment_slip_price_spaces, "0", STR_PAD_LEFT);
	}

	/**
	 * [_check_IBAN description]
	 * @return [type] [description]
	 */
	private function _check_IBAN()
	{
		$iban = $this->_iban;
		$iban = strtolower(str_replace(' ','',$iban));
		if(strlen($iban) == $this->_countries[substr($iban,0,2)])
		{
			$movedChar = substr($iban, 4).substr($iban,0,4);
			$movedCharArray = str_split($movedChar);
			$newString = "";
			foreach($movedCharArray as $key => $value) 
			{
				if(!is_numeric($movedCharArray[$key])) 
				{
					$movedCharArray[$key] = $this->_chars[$movedCharArray[$key]];
				}
				$newString .= $movedCharArray[$key];
			}

			if(bcmod($newString, '97') == 1) 
			{
				return TRUE;
			}
			else 
			{
				throw new \Exception("IBAN is invalid."); 
			}
		}
		else 
		{
			throw new \Exception("IBAN is invalid."); 
		}
	}
}