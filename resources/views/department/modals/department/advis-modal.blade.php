@foreach ($students as $student)
<div id="adviseModal" class="modal-overlay hidden scrollbar-thin scrollbar-thumb-green-500 scrollbar-track-gray-100">
    <div class="modal-container shadow-lg rounded-lg overflow-hidden w-1/2"> <!-- Adjusted width to 1/4 -->
        <div class="modal-content rounded-lg overflow-hidden">

            <!-- Successfully Advised Modal -->
            <div id="successModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-green-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <p class="text-gray-800 font-semibold">Successfully advised</p>
                </div>
            </div>

            <!-- Modal Header -->
            <div class="modal-header border-b border-border-color mb-6 flex justify-between items-center">
                <h2 class="modal-title text-primary font-semibold text-lg">Advise Student</h2>
                <button type="button" class="modal-close text-gray-600 hover:text-gray-900" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <form method="POST" action="{{ route('department.enrollment.advise.student', $student->id) }}">
                @csrf
                <div class="modal-body overflow-y-auto max-h-96 space-y-6 pr-5 pl-3 grid grid-cols-1 md:grid-cols-2 gap-6">
                    

                    <!-- Student Number -->
                    <div class="col-span-1">
                        <label for="studentNumber{{ $student->id }}" class="form-label fs-5 fw-bold">Student Number</label>
                        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" id="studentNumber{{ $student->id }}" value="{{ $student->student_number }}" readonly>
                    </div>

                    <!-- Program -->
                    <div class="col-span-1">
                        <label for="program{{ $student->id }}" class="form-label fs-5 fw-bold">Program</label>
                        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" id="program{{ $student->id }}" value="{{ $student->program_id }}" readonly>
                    </div>

                    <!-- Select Courses with Checkboxes -->
                    <div class="col-span-1 md:col-span-2">
                        <label for="courses{{ $student->id }}" class="form-label fs-5 fw-bold">Select Courses <small>(Select multiple courses using Ctrl/Command key.)</small></label>
                        <div id="courses{{ $student->id }}" class="w-full">
                            @foreach ($courses as $course)
                                @if ($course->program_id == $student->program_id || $course->program_id == 3)
                                    <div class="flex items-center mb-2">
                                        <input type="checkbox" name="courses[]" value="{{ $course->course_code }}" id="course{{ $course->course_code }}" class="form-checkbox h-5 w-5 text-primary mr-2">
                                        <label for="course{{ $course->course_code }}" class="text-sm text-gray-800">
                                            {{ $course->year }} Year, {{ $course->semester }} Semester - 
                                            {{ $course->course_code }} - {{ $course->course_title }}
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Classification -->
                    <div class="col-span-1">
                        <label for="classification{{ $student->id }}" class="form-label fs-5 fw-bold">Classification</label>
                        <select id="classification{{ $student->id }}" class="form-select w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="classification">
                            <option value="under evaluation" {{ old('classification', $student->classification) == 'under evaluation' ? 'selected' : '' }}>Under Evaluation</option>
                            <option value="pending" {{ old('classification', $student->classification) == 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>

                    <!-- Advising Notes -->
                    <div class="col-span-1 md:col-span-2">
                        <label for="advisingNotes{{ $student->id }}" class="form-label fs-5 fw-bold">Advising Notes</label>
                        <textarea name="advising_notes" id="advisingNotes{{ $student->id }}" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary">{{ old('advising_notes', $student->advising_notes) }}</textarea>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer flex justify-end space-x-4 pr-5 pt-8">
                    <button type="submit" class="text-white px-10 h-8 rounded-lg bg-primary hover:bg-lime-green btn-success" onclick="onFormSubmitSuccess()">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showSuccessModal() {
        const modal = document.getElementById('successModal');
        modal.classList.remove('hidden');

        // Hide the modal after 5 seconds
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 5000);
    }

    // Call this function when the form is successfully submitted
    function onFormSubmitSuccess() {
        showSuccessModal();
        // Add any additional form submission logic here, if needed
    }
</script>
@endforeach
