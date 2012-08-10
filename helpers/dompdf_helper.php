<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Helper to create PDF files using dompdf.
 * 
 * See http://code.google.com/p/dompdf/ for more info on dompdf.
 * 
 * This spark is basically a wrapper around the information supplied at
 * https://github.com/EllisLab/CodeIgniter/wiki/PDF-generation-using-dompdf
 * 
 * @link		https://github.com/POWCorp/codeigniter-dompdf-spark
 * @package		helpers
 * @author		Jan Lindblom <jan@powcorp.se>
 * @copyright	Copyright (c) 2012, POW! Corp.
 * @license		The dompdf helper is MIT licensed, dompdf is lGPL.
 * @version		0.5.3
 */

if ( ! function_exists('pdf_create')) {
	/**
	 * Create a PDF using dompdf.
	 * 
	 * @access public
	 * @param string $html the HTML to render (default: '').
	 * @param string $filename optional file name to store the pdf (default: '').
	 * @param mixed $stream whether or not to stream to browser (default: false).
	 * @return mixed the raw PDF output if $stream is true, otherwise the PDF is
	 *         streamed to a file.
	 */
	function pdf_create($html = '', $filename = '', $stream = false) {
		require_once("dompdf/dompdf_config.inc.php");
		
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();
		if (!$stream) {
			$dompdf->stream($filename.".pdf");
		} else {
			return $dompdf->output();
		}
	}
}
?>
