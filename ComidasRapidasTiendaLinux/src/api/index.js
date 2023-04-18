const express = require('express');
const cors = require('cors');
const app = express();

app.use(cors());


const Hamburguesa = [{
        id: 1,
        nombre: "Clásica",
        precio: 5.99,
        descripcion: "Una hamburguesa tradicional con carne de res jugosa, lechuga fresca, tomate, cebolla y salsa especial."
    },
    {
        id: 2,
        nombre: "Doble carne con queso",
        precio: 7.99,
        descripcion: "Una hamburguesa doble con dos jugosas carnes de res, queso derretido, lechuga fresca, tomate y cebolla."
    },
    {
        id: 3,
        nombre: "Hamburguesa vegetariana",
        precio: 6.99,
        descripcion: "Una hamburguesa vegetariana hecha con una deliciosa mezcla de vegetales, queso, lechuga fresca y salsa especial."
    },
    {
        id: 4,
        nombre: "Hamburguesa de pollo crispy",
        precio: 6.99,
        descripcion: "Una hamburguesa de pollo crispy con pollo frito crujiente, lechuga fresca, tomate y salsa especial."
    },
    {
        id: 5,
        nombre: "Hamburguesa con huevo",
        precio: 6.99,
        descripcion: "Una hamburguesa clásica con un huevo frito encima, lechuga fresca, tomate, cebolla y salsa especial."
    },
    {
        id: 6,
        nombre: "Hamburguesa con tocino",
        precio: 7.99,
        descripcion: "Una deliciosa hamburguesa con tocino crujiente, queso, lechuga fresca, tomate, cebolla y salsa especial."
    },
    {
        id: 7,
        nombre: "Hamburguesa con champiñones",
        precio: 6.99,
        descripcion: "Una hamburguesa con jugosos champiñones salteados, queso, lechuga fresca, tomate y salsa especial."
    },
    {
        id: 8,
        nombre: "Hamburguesa BBQ",
        precio: 7.99,
        descripcion: "Una hamburguesa con salsa barbacoa, cebolla caramelizada, queso, lechuga fresca y tomate."
    },
    {
        id: 9,
        nombre: "Hamburguesa con jalapeños",
        precio: 6.99,
        descripcion: "Una hamburguesa con jalapeños picantes, queso, lechuga fresca, tomate, cebolla y salsa especial."
    },
    {
        id: 10,
        nombre: "Hamburguesa con aguacate",
        precio: 7.99,
        descripcion: "Una hamburguesa con delicioso aguacate fresco, queso, lechuga fresca, tomate y salsa especial."
    },
    {
        id: 11,
        nombre: "Hamburguesa con queso azul",
        precio: 7.99,
        descripcion: "Una hamburguesa con queso azul cremoso, cebolla caramelizada, lechuga fresca, tomate y salsa especial."
    }
]


const Tacos = [{
        id: 1,
        nombre: "Clásica",
        precio: 5.99,
        descripcion: "Taco clásico con carne de res, cebolla, cilantro y salsa."
    },
    {
        id: 2,
        nombre: "Al Pastor",
        precio: 6.99,
        descripcion: "Taco de carne de cerdo adobada con piña, cebolla y cilantro."
    },
    {
        id: 3,
        nombre: "Carnitas",
        precio: 7.99,
        descripcion: "Taco de carne de cerdo cocida lentamente con especias y jugo de naranja."
    },
    {
        id: 4,
        nombre: "Asada",
        precio: 8.99,
        descripcion: "Taco de carne de res asada con cebolla, cilantro y salsa."
    },
    {
        id: 5,
        nombre: "Pollo",
        precio: 6.49,
        descripcion: "Taco de pollo marinado con especias y asado con cebolla, cilantro y salsa."
    },
    {
        id: 6,
        nombre: "Barbacoa",
        precio: 9.99,
        descripcion: "Taco de carne de res cocida lentamente en su jugo con especias y consomé."
    },
    {
        id: 7,
        nombre: "Lengua",
        precio: 7.99,
        descripcion: "Taco de lengua de res cocida lentamente con especias y salsa de cilantro."
    },
    {
        id: 8,
        nombre: "Chorizo",
        precio: 6.99,
        descripcion: "Taco de chorizo de cerdo con cebolla, cilantro y salsa."
    },
    {
        id: 9,
        nombre: "Pescado",
        precio: 9.99,
        descripcion: "Taco de pescado marinado y frito con salsa de yogur y col."
    },
    {
        id: 10,
        nombre: "Camarones",
        precio: 10.99,
        descripcion: "Taco de camarones con ajo y cilantro, servido con salsa de aguacate."
    },
    {
        id: 11,
        nombre: "Vegetariano",
        precio: 6.99,
        descripcion: "Taco con una variedad de verduras asadas, frijoles negros y salsa picante."
    },
    {
        id: 12,
        nombre: "Vegano",
        precio: 7.49,
        descripcion: "Taco con proteína vegetal, aguacate, cebolla, cilantro y salsa vegana."
    },
    {
        id: 13,
        nombre: "De Papa",
        precio: 5.49,
        descripcion: "Taco con relleno de papa sazonada, cebolla, cilantro y salsa picante."
    },
    {
        id: 14,
        nombre: "Queso",
        precio: 5.99,
        descripcion: "Taco con queso fundido, guacamole, crema y salsa picante."
    }
]

const Pizza = [
    {
        id: 1,
        nombre: "Clásica",
        precio: 5.99,
        descripcion: "Pizza clásica con salsa de tomate, queso mozzarella y pepperoni."
      },
      {
        id: 2,
        nombre: "Hawaina",
        precio: 6.99,
        descripcion: "Pizza con salsa de tomate, queso mozzarella, jamón y piña."
      },
      {
        id: 3,
        nombre: "Margarita",
        precio: 6.49,
        descripcion: "Pizza con salsa de tomate, queso mozzarella y albahaca fresca."
      },
      {
        id: 4,
        nombre: "Barbacoa",
        precio: 7.99,
        descripcion: "Pizza con salsa de barbacoa, pollo a la parrilla, cebolla roja y cilantro."
      },
      {
        id: 5,
        nombre: "Vegetariana",
        precio: 7.49,
        descripcion: "Pizza con salsa de tomate, queso mozzarella, champiñones, pimientos, cebolla y aceitunas."
      },
      {
        id: 6,
        nombre: "Cuatro Quesos",
        precio: 8.99,
        descripcion: "Pizza con salsa de tomate, queso mozzarella, queso cheddar, queso de cabra y queso azul."
      },
      {
        id: 7,
        nombre: "Pepperoni",
        precio: 5.99,
        descripcion: "Pizza con salsa de tomate, queso mozzarella y generosas rodajas de pepperoni."
      },
      {
        id: 8,
        nombre: "Pollo BBQ",
        precio: 7.99,
        descripcion: "Pizza con salsa de barbacoa, pollo a la parrilla, cebolla roja y cilantro."
      },
      {
        id: 9,
        nombre: "Mexicana",
        precio: 7.49,
        descripcion: "Pizza con salsa de tomate, queso mozzarella, carne molida, jalapeños y nachos triturados."
      },
      {
        id: 10,
        nombre: "Carnívora",
        precio: 8.99,
        descripcion: "Pizza con salsa de tomate, queso mozzarella, pepperoni, salchicha, jamón y carne molida."
      },
      {
        id: 11,
        nombre: "Mariscos",
        precio: 9.99,
        descripcion: "Pizza con salsa de tomate, queso mozzarella, camarones, mejillones y almejas."
      },
      {
        id: 12,
        nombre: "Prosciutto",
        precio: 8.49,
        descripcion: "Pizza con salsa de tomate, queso mozzarella, prosciutto, rúcula y queso parmesano."
      },
      {
        id: 13,
        nombre: "Huevo y Bacon",
        precio: 7.99,
        descripcion: "Pizza con salsa de tomate, queso mozzarella, huevo, tocino y cebolla roja."
      }

]

const lazana = [
    {
        id: 1,
        nombre: "Clásica",
        precio: 5.99,
        descripcion: "Lasaña clásica con carne, salsa de tomate y queso.",
      },
      {
        id: 2,
        nombre: "Vegetariana",
        precio: 6.99,
        descripcion: "Lasaña vegetariana con verduras, salsa blanca y queso.",
      },
      {
        id: 3,
        nombre: "De Pollo",
        precio: 7.99,
        descripcion: "Lasaña de pollo con salsa de tomate, queso y pollo desmenuzado.",
      },
      {
        id: 4,
        nombre: "De Carne",
        precio: 7.99,
        descripcion: "Lasaña de carne con salsa de tomate, queso y carne molida.",
      },
      {
        id: 5,
        nombre: "De Espinacas",
        precio: 6.99,
        descripcion: "Lasaña de espinacas con salsa blanca, queso y espinacas.",
      },
      {
        id: 6,
        nombre: "De Berenjena",
        precio: 6.99,
        descripcion: "Lasaña de berenjena con salsa de tomate, queso y berenjena asada.",
      },
      {
        id: 7,
        nombre: "De Jamón y Queso",
        precio: 7.99,
        descripcion: "Lasaña de jamón y queso con salsa blanca y jamón cocido.",
      },
      {
        id: 8,
        nombre: "De Atún",
        precio: 7.99,
        descripcion: "Lasaña de atún con salsa de tomate, queso y atún enlatado.",
      },
      {
        id: 9,
        nombre: "De Calabacín",
        precio: 6.99,
        descripcion: "Lasaña de calabacín con salsa blanca, queso y calabacín asado.",
      },
      {
        id: 10,
        nombre: "De Champiñones",
        precio: 6.99,
        descripcion: "Lasaña de champiñones con salsa blanca, queso y champiñones salteados.",
      },
      {
        id: 11,
        nombre: "De Langostinos",
        precio: 8.99,
        descripcion: "Lasaña de langostinos con salsa blanca, queso y langostinos cocidos.",
      },
      {
        id: 12,
        nombre: "De Pesto",
        precio: 7.99,
        descripcion: "Lasaña de pesto con salsa blanca, queso y pesto de albahaca.",
      },
      {
        id: 13,
        nombre: "De Salmon",
        precio: 8.99,
        descripcion: "Lasaña de salmón con salsa blanca, queso y salmón ahumado.",
      },
]
const perrosCalientes = [

    {
        id: 1,
        nombre: "Clásica",
        precio: 5.99,
        descripcion: "Salchicha de cerdo con pan, acompañada de ketchup, mostaza, mayonesa, cebolla picada y chucrut."
    },
    {
        id: 2,
        nombre: "Cheddar y tocino",
        precio: 6.99,
        descripcion: "Salchicha de cerdo con pan, acompañada de queso cheddar derretido, tocino crujiente, cebolla caramelizada y salsa barbacoa."
    },
    {
        id: 3,
        nombre: "Mexicana",
        precio: 7.49,
        descripcion: "Salchicha de cerdo con pan, acompañada de jalapeños picados, cebolla asada, salsa picante, crema agria y cilantro fresco."
    },
    {
        id: 4,
        nombre: "Hawaina",
        precio: 6.99,
        descripcion: "Salchicha de cerdo con pan, acompañada de piña asada, salsa teriyaki, mayonesa y cilantro fresco."
    },
    {
        id: 5,
        nombre: "Chicago-style",
        precio: 7.99,
        descripcion: "Salchicha de cerdo con pan estilo Chicago, acompañada de pepinillos encurtidos, cebolla picada, tomate, mostaza, jalapeños deportivos y sal de apio."
    },
    {
        id: 6,
        nombre: "Cajún",
        precio: 6.99,
        descripcion: "Salchicha de cerdo con pan, acompañada de cebolla y pimiento salteados, salsa remoulade, salsa picante y cebollino."
    },
    {
        id: 7,
        nombre: "Italiana",
        precio: 7.49,
        descripcion: "Salchicha de cerdo con pan, acompañada de salsa de tomate, queso provolone derretido, cebolla salteada, pimientos asados y albahaca fresca."
    },
    {
        id: 8,
        nombre: "Gourmet",
        precio: 8.99,
        descripcion: "Salchicha de cerdo artesanal con pan de brioche, acompañada de queso de cabra, cebolla caramelizada, rúcula, aceite de trufa y reducción de balsámico."
    },
    {
        id: 9,
        nombre: "De queso",
        precio: 7.49,
        descripcion: "Salchicha de cerdo con pan, acompañada de queso fundido, cebolla salteada, pimientos asados y salsa de queso cheddar."
    },
    {
        id: 10,
        nombre: "De pollo",
        precio: 6.99,
        descripcion: "Salchicha de pollo con pan, acompañada de ensalada de col, salsa de mostaza y miel, y cilantro fresco."
    }
]

const bebidas = [
    {
        id: 1,
        nombre: "Clásica",
        precio: 5.99,
        descripcion: "Una bebida clásica y refrescante."
    },
    {
        id: 2,
        nombre: "Café",
        precio: 3.49,
        descripcion: "Una taza de café caliente o frío para disfrutar en cualquier momento del día."
    },
    {
        id: 3,
        nombre: "Té",
        precio: 2.99,
        descripcion: "Una bebida caliente y reconfortante con una amplia variedad de sabores y aromas."
    },
    {
        id: 4,
        nombre: "Refresco",
        precio: 1.99,
        descripcion: "Una bebida carbonatada y refrescante disponible en diferentes sabores y tamaños."
    },
    {
        id: 5,
        nombre: "Agua mineral",
        precio: 0.99,
        descripcion: "Una bebida natural y saludable que hidrata y refresca."
    },
    {
        id: 6,
        nombre: "Jugo de naranja",
        precio: 2.49,
        descripcion: "Un jugo natural y delicioso lleno de vitamina C y sabor cítrico."
    },
    {
        id: 7,
        nombre: "Limonada",
        precio: 2.99,
        descripcion: "Una bebida refrescante hecha con jugo de limón, azúcar y agua."
    },
    {
        id: 8,
        nombre: "Smoothie de frutas",
        precio: 4.99,
        descripcion: "Una bebida saludable y cremosa hecha con frutas frescas y yogur."
    },
    {
        id: 9,
        nombre: "Malteada",
        precio: 5.49,
        descripcion: "Una bebida dulce y espesa hecha con helado, leche y saborizante."
    },
    {
        id: 10,
        nombre: "Cerveza",
        precio: 3.99,
        descripcion: "Una bebida alcohólica fermentada hecha de malta, lúpulo, levadura y agua."
    },
    {
        id: 11,
        nombre: "Vino tinto",
        precio: 7.99,
        descripcion: "Una bebida alcohólica elaborada con uvas rojas fermentadas y envejecidas en barricas de roble."
    },
    {
        id: 12,
        nombre: "Vino blanco",
        precio: 6.99,
        descripcion: "Una bebida alcohólica elaborada con uvas blancas fermentadas y envejecidas en barricas de roble."
    },
    {
        id: 13,
        nombre: "Coctel",
        precio: 8.99,
        descripcion: "Una bebida alcohólica mezclada con jugos, licores y otros ingredientes para crear sabores únicos."
    }
];
app.get('/Hamburguesa', (req, resp) => {

    resp.json(Hamburguesa);
});

app.get('/Tacos', (req, resp) => {

    resp.json(Tacos);
});

app.get('/Pizza', (req, resp) => {

    resp.json(Pizza);
});
app.get('/lazana', (req, resp) => {

    resp.json(lazana);
});
app.get('/perrosCalientes', (req, resp) => {

    resp.json(perrosCalientes);
});
app.get('/bebidas', (req, resp) => {

    resp.json(bebidas);
});

// app.get('/productos/:id/imagen',(req,res)=>{
//   const id = parseInt(req.params.id);
//    const producto = Hamburguesa.find(p => p.id === id);

//    if(producto){
//      const rutaImagen = productos.ruta;
//      const imagen = fs.readFileSync(rutaImagen);
//      res.attachment('imagen.webp');
//      res.send(imagen);
//    }
//    res.status(404).json({
//          mensaje: 'Producto no encontrado'
//    });

// })

app.listen(5500, () => {
    console.log('Servidor corriendo por el puerto 5500');
});

process.on('unhandledRejection', error => {
    console.log(error);
    process.exit(l);
})