<?php

 namespace App\Http\Controllers;

    use App\Contracts\Services\UserService\PrescriptionServiceInterface;

    use Illuminate\Http\Request;
    use App\Models\Prescription;
    use App\Models\User;
    use App\Models\GlobalRequest;
    use App\Models\PatientTransferRequest;
    use App\Models\RequestModifyAppointment;
    use App\Models\Requests;
    class PrescriptionController extends Controller
    {
        protected $prescriptionService;

        public function __construct(PrescriptionServiceInterface $prescriptionService)
        {
            $this->prescriptionService = $prescriptionService;
        }




public function addPrescription(Request $request)
{
    try {
    $data = $request->all();
    $prescription = $this->prescriptionService->addPrescription($data);
    return response()->json([$prescription], 200);

} catch (\Exception $e) {
    return response()->json(['error' => $e->getMessage()], 400);
}
}


// public function showPrescriptionsForUser($userId) {
//     $prescriptionService = new PrescriptionService();
//     $prescriptions = $prescriptionService->getAllPrescriptionsForUser($userId);

//     return response()->json($prescriptions);
// }


// public function getPrescriptionsByPatient($patientID = null)
// {
//     try {
//       ///  $patientID = $patientID ?? auth('user')->user()->id;
//        // $patient = User::findOrFail($patientID);
//        $prescriptions = $prescriptionService->getAllPrescriptionsForUser($patientID);
//         return response()->json(["prescriptions" =>$prescriptions], 200);
//     } catch (\Exception $e) {
//         return response()->json(['error' => $e->getMessage()], 400);
//     }
// }



public function getPrescriptionsByPatient($patientID = null)
{
    try {
      ///  $patientID = $patientID ?? auth('user')->user()->id;
       // $patient = User::findOrFail($patientID);
       $patientID = $patientID ?? auth('user')->user()->id;
       $prescriptions = $this->prescriptionService->getAllPrescriptionsForUser($patientID);
        return response()->json(["prescriptions" =>$prescriptions], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    }
}


    public function updatePrescription(Request $request, $prescriptionId)
    {
        $data = $request->all();
        $updatedPrescription = $this->prescriptionService->updatePrescription($prescriptionId, $data);
        return response()->json(['Prescription'=> $updatedPrescription]);
    }

  
}

    
