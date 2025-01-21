<!-- Modal Overlay -->
<div id="enrollModal{{ $student->id }}" class="modal-overlay hidden flex items-center justify-center inset-0 bg-black bg-opacity-50">
    <div class="modal-container max-h-screen overflow-y-auto bg-white p-6 rounded-lg shadow-big">
        <div class="modal-header">
            <h5 class="modal-title" id="enrollModalLabel{{ $student->id }}">Enroll Student</h5>
            <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <form method="POST" action="{{ route('registrar.enrollment.enroll.student', $student->id) }}">
            @csrf
            <div class="modal-body">
                <div class="mb-4">
                    <label for="studentNumber" class="form-label">Student Number</label>
                    <input type="text" class="form-input" id="studentNumber{{ $student->id }}" value="{{ $student->student_number }}" readonly>
                </div>

                <!-- Courses Table -->
                <div class="mb-4">
                    <label for="courses{{ $student->id }}" class="form-label">Courses</label>
                    <div class="overflow-auto max-h-60">
                        <table class="w-full border-collapse">
                            <thead class="bg-light-gray">
                                <tr>
                                    <th class="border p-2">Course Code</th>
                                    <th class="border p-2">Course Title</th>
                                    <th class="border p-2">Year</th>
                                    <th class="border p-2">Semester</th>
                                    <th class="border p-2">Lecture Units</th>
                                    <th class="border p-2">Laboratory Units</th>
                                    <th class="border p-2">Pre-requisite</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $courses = json_decode($student->courses, true);
                                    $totalLecUnits = 0;
                                    $totalLabUnits = 0;
                                @endphp
                                @if(is_array($courses))
                                    @foreach($courses as $course)
                                        @php
                                            $totalLecUnits += $course['credit_unit_lecture'];
                                            $totalLabUnits += $course['credit_unit_laboratory'];
                                        @endphp
                                        <tr>
                                            <td class="border p-2">{{ $course['course_code'] }}</td>
                                            <td class="border p-2">{{ $course['course_title'] }}</td>
                                            <td class="border p-2">{{ $course['year'] }}</td>
                                            <td class="border p-2">{{ $course['semester'] }}</td>
                                            <td class="border p-2">{{ $course['credit_unit_lecture'] }}</td>
                                            <td class="border p-2">{{ $course['credit_unit_laboratory'] }}</td>
                                            <td class="border p-2">{{ $course['pre_requisite'] }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center text-gray-500">No courses available</td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr class="bg-light-gray">
                                    <th colspan="4" class="border p-2 text-right">Total Units:</th>
                                    <th class="border p-2">{{ $totalLecUnits }}</th>
                                    <th class="border p-2">{{ $totalLabUnits }}</th>
                                    <th class="border p-2"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="classification{{ $student->id }}" class="form-label">Classification</label>
                    <select class="form-input" name="classification" id="classification{{ $student->id }}" required>
                        <option value="regular" {{ $student->classification === 'regular' ? 'selected' : '' }}>Regular</option>
                        <option value="irregular" {{ $student->classification === 'irregular' ? 'selected' : '' }}>Irregular</option>
                        <option value="transferee" {{ $student->classification === 'transferee' ? 'selected' : '' }}>Transferee</option>
                        <option value="returnee" {{ $student->classification === 'returnee' ? 'selected' : '' }}>Returnee</option>
                        <option value="under evaluation" {{ $student->classification === 'under evaluation' ? 'selected' : '' }}>Under Evaluation</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="year{{ $student->id }}" class="form-label">Year</label>
                    <select class="form-input" name="year" id="year{{ $student->id }}" required>
                        <option value="1st Year" {{ old('year', $student->year) === '1st Year' ? 'selected' : '' }}>1st Year</option>
                        <option value="2nd Year" {{ old('year', $student->year) === '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                        <option value="3rd Year" {{ old('year', $student->year) === '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                        <option value="4th Year" {{ old('year', $student->year) === '4th Year' ? 'selected' : '' }}>4th Year</option>
                        <option value="5th Year" {{ old('year', $student->year) === '5th Year' ? 'selected' : '' }}>5th Year</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="section{{ $student->id }}" class="form-label">Section</label>
                    <input type="text" class="form-input" name="section" id="section{{ $student->id }}" value="{{ $student->section }}" required>
                </div>
            </div>
            <div class="modal-footer flex justify-end gap-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
