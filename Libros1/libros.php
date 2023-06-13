<?php


class Libro {
    //Atributos
    public $autor;
    public $titulo;
    protected $precio;
    public $existencias;
    public $id;
  
    //Metodos magicos
    public function __construct(
      $autor,
      $titulo,
      $precio,
      $existencias,
      $id
    ) {
      $this->autor = $autor;
      $this->titulo = $titulo;
      $this->precio = $precio;
      $this->existencias = $existencias;
      $this->id = $id;
    }

    public function masInfo() {

      return print('<ul>
           <li>Autor <b>' . $this->autor . '</b></li>
           <li>Titulo <b>' . $this->titulo . '</b></li>
          <li>Precio <b>' . $this->precio . '</b></li>
          <li>Existencias <b>' . $this->existencias . '</b></li>
          <li>id <b>' . $this->id . '</b></li>
      </ul>');
  
    }
  }

  
  
  // Instancia de la clase
  $libro1 = new Libro(
    'Tomas Kunt',
    'La teoria de las revoluciones cientificas',
    15000,
    20,
    1
  );
  
  //analizar la variable de un objeto
  //var_dump($libro1);

  class Comic extends Libro {

    public array $ilustradores;
    public $volumen;

    //para generar la construccion de la clase Comic hay que traer las propiedades de la super clase Libro y agregar las propiedades necesarias de la clase Comic, con el parent::
    public function __construct($autor, $titulo, $precio, $existencias, $id, $ilustradores, $volumen) {
        parent::__construct($autor, $titulo, $precio, $existencias, $id);
        $this->ilustradores = $ilustradores;
        $this->volumen = $volumen;
    }

    public function masInfo() {
      //La var result apunta a la propiedad Volumen de la clase Comic.   
      $result = "Volumen: $this->volumen";

        //Agregar la variable UL que contiene la nueva propiedad de Comic: Ilustradores. En la creación de la clase, la propiedad Ilistradores está creada como un array, ya que puede ser mas de uno. Hacemos un foreach para recorrer este array. 
        $ul = "<ul>Ilustradores";
        foreach ($this->ilustradores as $ilustrador) {
            $ul .= "<li>$ilustrador</li>";
        }
        $ul .= "</ul>";

        echo parent::masInfo(); //Acá llamamos a la función masInfo de la clase padre o super Clase Libro
        echo $result .= $ul;
    }
}


echo 'comics:';
$ilustradores = ["Coke", "John"]; //Acá definimos el array de la var Ilustradores. 
//Al instanciar; valores de las variables o propiedades de la clase
$comic = new Comic('Stan Lee', 'Spiderman', '9000', '1', '1', $ilustradores, '3000'); 
$comic->masInfo();


   class Ebook extends Comic {

  }
 

  
  

