<?php
namespace App\Controllers;

// use App\Products;

class ProductController extends Controller
{
    private $products;

    public function __construct($app)
    {
        parent::__construct($app);
        // $this->products = new Products($this->app->path('database/products.json'));
    }

    public function index()
    {
        return $this->app->view('products.index', [
            'products' => $this->app->db()->all('products')

        ]);
    }

    public function show()
    {
        # Get the 'id' route parameter
        $id = $this->app->param('id');

        # If no id is present, send the user to the products page
        if (is_null($id)) {
            $this->app->redirect('/products');
        }

        # Load the product details
       
        //  $product = $this->products->getById($id);
        $product = $this->app->db()->findById('products', $id);
        # If we can't find the product, return the 'product missing' view
        if (is_null($product)) {
            return $this->app->view('errors.404');
        }

        # Load the review details
        $reviews = $this->app->db()->findByColumn('reviews', 'product_id', '=', $id);
        
        # If the user submitted the review form, we'll have a confirmation name
        # that we'll pass to the view to show them a confirmation message
        $confirmationName = $this->app->old('confirmationName');

        return $this->app->view('products.show', [
            'product' => $product,
            'confirmationName' => $confirmationName,
            'reviews' => $reviews,
        ]);
    }

    public function saveReview()
    {
        $this->app->validate([
            'name' => 'required',
            'content' => 'required|minLength:200',
            //'password' => 'minLength:7'
        ]);

        # If the above validation fails, the user is redirected back to the product page
        # and none of the following code will execute

        # Extract data from the form submission
        $name = $this->app->input('name');
        $content = $this->app->input('content');
        $id = $this->app->input('id');

        # To Do: Persist the review to the database
        
        $data = [
            'name' => $name,
            'content' => $content,
            'product_id' => $id,
        ];

        $this->app->db()->insert('reviews', $data);

        # Send the user back to the product page with a 'confirmationName'
        # we'll use to display a confirmation message
        $this->app->redirect('/product?id='.$id, ['confirmationName' => $name]);
    }
}
