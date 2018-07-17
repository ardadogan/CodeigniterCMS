<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo extends MY_Controller {




	public function index()
	{

		
		$datas = $this->db->where('languageId !=',0)->get('app')->result_array();

		$data['base'] = $this->db->where('languageId',0)->get('app')->row();

		$data['langs'] = array();

		foreach ($datas as $key => $value) {
			$data['langs'][$value['languageId']] = $value;
			
		}

		
		$this->header('SEO Ayarları');
			$this->load->view('settings/seo/index',$data);
		$this->footer();
	}


	public function update()
	{
		
		# Form Data
			$formData = $this->input->post();

		# Category Info
			$sData = $formData['common'];

			$this->db->where('languageId',0);
			$this->db->update('app',$sData);
			
			unset($formData['common']);

		# Language Data's
			$saveData = array();

			
			foreach ($this->langs as $key => $value) {
				$d = $this->db->where('languageId',$value->languageId)->get('app')->num_rows();

				if($d<1){
					$cols = array(
						'appId' => 1,
						'languageId' => $value->languageId,
						);
					$this->db->insert('app',$cols);
				}

			}


			foreach ($formData as $key => $value) {
				$saveData[$key] = array(
					'languageId' => $value['langId'],
					'title' => $value['title'],
					'description' => $value['description'],
					'keywords' => $value['keywords']
					);
			}


			$update = $this->db->update_batch('app', $saveData,'languageId');

	
			$this->success("Bilgiler Güncellendi");

	}


	public function delete($categoryId=false)
	{
		$this->db->where('categoryId',$categoryId)->delete('pages_category_lang');
		$this->db->where('categoryId',$categoryId)->delete('pages_category');

		$this->success("Kategori Silindi");
	}




	





}
