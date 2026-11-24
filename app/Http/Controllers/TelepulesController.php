<?php

namespace App\Http\Controllers;

use App\Models\Telepules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TelepulesController extends Controller
{
    /**
     * @api {post} /login Bejelentkezés
     * @apiName Login
     * @apiGroup Auth
     * @apiBody {String} email E-mail cím
     * @apiBody {String} password Jelszó
     * @apiSuccess {String} token A módosításokhoz szükséges token
     * @apiSuccessExample {json} Válasz:
     *     {"token": "1|abc123..."}
     * @apiError (401) Hibás e-mail vagy jelszó
     */
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Hibás e-mail vagy jelszó'], 401);
        }

        return ['token' => Auth::user()->createToken('token')->plainTextToken];
    }

    /**
     * @api {get} /telepulesek Települések listája
     * @apiName Lista
     * @apiGroup Telepulesek
     * @apiQuery {String} [search] Keresés településnévre vagy irányítószámra
     * @apiQuery {String} [megye] Szűrés megyére
     * @apiSuccessExample {json} Válasz:
     *     [{"id": 2, "irsz": "2000", "nev": "Szentendre", "megye": "Pest"}]
     */
    public function index(Request $request)
    {
        $telepulesek = Telepules::query();

        if ($request->search) {
            $telepulesek->where(function ($q) use ($request) {
                $q->where('nev', 'like', '%' . $request->search . '%')
                  ->orWhere('irsz', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->megye) {
            $telepulesek->where('megye', $request->megye);
        }

        return $telepulesek->get();
    }

    /**
     * @api {post} /telepulesek Új település
     * @apiName Uj
     * @apiGroup Telepulesek
     * @apiHeader {String} Authorization Bearer token
     * @apiBody {String} irsz Irányítószám
     * @apiBody {String} nev Település neve
     * @apiBody {String} megye Megye
     * @apiSuccessExample {json} Válasz:
     *     {"id": 9, "irsz": "8000", "nev": "Székesfehérvár", "megye": "Fejér"}
     */
    public function store(Request $request)
    {
        $request->validate([
            'irsz' => 'required',
            'nev' => 'required',
            'megye' => 'required',
        ]);

        return Telepules::create($request->all());
    }

    /**
     * @api {put} /telepulesek/:id Település módosítása
     * @apiName Modositas
     * @apiGroup Telepulesek
     * @apiHeader {String} Authorization Bearer token
     * @apiParam {Number} id Település azonosító
     * @apiBody {String} [irsz] Irányítószám
     * @apiBody {String} [nev] Település neve
     * @apiBody {String} [megye] Megye
     */
    public function update(Request $request, $id)
    {
        $telepules = Telepules::findOrFail($id);
        $telepules->update($request->all());

        return $telepules;
    }

    /**
     * @api {delete} /telepulesek/:id Település törlése
     * @apiName Torles
     * @apiGroup Telepulesek
     * @apiHeader {String} Authorization Bearer token
     * @apiParam {Number} id Település azonosító
     */
    public function destroy($id)
    {
        Telepules::findOrFail($id)->delete();

        return ['message' => 'Törölve'];
    }
}
