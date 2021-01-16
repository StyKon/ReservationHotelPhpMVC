<?php

class Client extends Controller
{
    public function index()
    {
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'Civilite' => 'string|required',
            'Password' => 'string|required',
            'Nom' => 'string|required',
            'Prenom' => 'string|required',
            'Email' => 'required|email',
            'Mobile' => 'string|required',
            'Adresse' => 'string|required',
            'CodePostal' => 'string|required',
            'Ville' => 'string|required'

          ]);
          if(Client::where('Civilite', $request->get('Civilite'))->first()){
            return redirect('inscription')
            ->withErrors(['msg', 'Reservation not Canceled']);
        }else{
          Client::create($request->all());
          return redirect()->route('welcome')
          ->with('success', 'Inscription succés');
        }
    }
    public function show($id)
    {
        $client = Client::find($id);
    }
    public function edit($id)
    {
        $client = Client::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'Civilite' => 'required',
            'Nom' => 'required',
            'Prenom' => 'required',
            'Email' => 'required|email',
            'Mobile' => 'required',
            'Adresse' => 'required',
            'CodePostal' => 'required',
            'Ville' => 'required',
            'Id_Hotel' => 'required'
          ]);
          $client = Client::find($id);
          $client->Civilite = $request->get('Civilite');
          $client->Nom = $request->get('Nom');
          $client->Prenom = $request->get('Prenom');
          $client->Email = $request->get('Email');
          $client->Mobile = $request->get('Mobile');
          $client->Adresse = $request->get('Adresse');
          $client->CodePostal = $request->get('CodePostal');
          $client->Ville = $request->get('Ville');
          $client->Id_Hotel = $request->get('Id_Hotel');
          $client->save();
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
      /*  return redirect()->route('Category.index')
        ->with('success', 'Category supprimer avec succés');*/

    }

}
?>