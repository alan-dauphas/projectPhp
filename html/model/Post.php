<?php
	require_once("Manager.php");

class Post extends Manager
{

	private $id;

	private $title;

	private $content;

	private $creationDateFr;

	private $row;

	// SETTER en anglais Mutateur en francais // sert a modifier les variables private

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function setCreationDateFr($creationDateFr)
	{
		$this->creationDateFr = $creationDateFr;
	}

	// GETTER en anglais Accesseurs en francais // sert a appeler le contenu des variables préalablement modifié

	public function getId()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return ucfirst($this->title);
	}

	public function getContent()
	{
		return htmlspecialchars_decode(ucfirst($this->content)); //Convertit les entités HTML spéciales en caractères + Mise en majuscule premier Caracteres
	}

	public function getCreationDateFr()
	{
		return htmlspecialchars($this->creationDateFr);
	}

	public function create($id, $title, $content, $creationDateFr)
	{
		$this->setId($id);
		$this->setTitle($title);
		$this->setContent($this->resumeContent($content));
		$this->setCreationDateFr($creationDateFr);

	}

	public function resumeContent($content)
	{
		return substr($content , 0 , 80);
	}

}
