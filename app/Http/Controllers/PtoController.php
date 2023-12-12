// app/Http/Controllers/PtoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pto;

class PtoController extends Controller
{
    public function index()
    {
        $ptos = Pto::all();
        return $ptos;
    }

    public function store(Request $request)
    {
        $ptos = new Pto();
        $ptos->name = $request->name;
        $ptos->type = $request->type;
        $ptos->subject = $request->subject;
        $ptos->dateStart = $request->dateStart;
        $ptos->dateEnd = $request->dateEnd;
        $ptos->save();

        return $ptos;
    }

    public function destroy($id)
        {
            $ptos = Pto::destroy($id);
            return $ptos;
        }
}