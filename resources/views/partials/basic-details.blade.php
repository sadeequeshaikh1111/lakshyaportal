<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Details</title>
</head>
<body>
    <div class="form-container" style="width: 100%; max-width: 800px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="first_name" style="width: 20%;">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required autofocus autocomplete="given-name" style="width: 30%; padding: 8px; margin-right: 2%;">
                <span style="margin-right: 5px;">&emsp;</span>
                <label for="middle_name" style="width: 20%;">Middle Name:</label>
                <input type="text" id="middle_name" name="middle_name" value="{{ old('middle_name') }}" autocomplete="additional-name" style="width: 30%; padding: 8px;">
            </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('first_name') }}</div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('middle_name') }}</div>

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="last_name" style="width: 20%;">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name" style="width: 30%; padding: 8px; margin-right: 2%;">
                <span style="margin-right: 5px;">&emsp;</span>
                <label for="mother_name" style="width: 20%;">Mother's Name:</label>
                <input type="text" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" autocomplete="additional-name" style="width: 30%; padding: 8px;">
            </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('last_name') }}</div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('mother_name') }}</div>
            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
    <!-- Date of Birth -->
    <label for="dob" style="width: 20%;">Date of Birth:</label>
    <input type="date" id="dob" name="dob" value="{{ old('dob') }}" required style="width: 30%; padding: 8px; margin-right: 2%;">
    <span style="margin-right: 5px;">&emsp;</span>
    <!-- Permanent Address -->
    <label for="permanent_address" style="width: 20%;">Permanent Address:</label>
    <textarea id="permanent_address" name="permanent_address" rows="3" style="width: 30%; padding: 8px;" required>{{ old('permanent_address') }}</textarea>
</div>
<div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">
    {{ $errors->first('dob') }}
</div>
<div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">
    {{ $errors->first('permanent_address') }}
</div>

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="gender" style="width: 20%;">Gender:</label>
                <select id="gender" name="gender" required style="width: 30%; padding: 8px; margin-right: 2%;">
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <span style="margin-right: 5px;">&emsp;</span>
                <label for="country" style="width: 20%;">Country:</label>
                <input type="text" id="country" name="country" value="{{ old('country') }}" required autocomplete="country" style="width: 30%; padding: 8px;">
            </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('gender') }}</div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('country') }}</div>

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="state" style="width: 20%;">State:</label>
                <input type="text" id="state" name="state" value="{{ old('state') }}" required autocomplete="address-level1" style="width: 30%; padding: 8px; margin-right: 2%;">
                <span style="margin-right: 5px;">&emsp;</span>
                <label for="district" style="width: 20%;">District:</label>
                <input type="text" id="district" name="district" value="{{ old('district') }}" required autocomplete="address-level2" style="width: 30%; padding: 8px;">
            </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('state') }}</div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('district') }}</div>

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="taluka" style="width: 20%;">Taluka:</label>
                <input type="text" id="taluka" name="taluka" value="{{ old('taluka') }}" required autocomplete="address-level3" style="width: 30%; padding: 8px; margin-right: 2%;">
                <span style="margin-right: 5px;">&emsp;</span>
                <label for="mobile_number" style="width: 20%;">Mobile Number:</label>
                <input type="tel" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="tel" style="width: 30%; padding: 8px;">
            </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('taluka') }}</div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('mobile_number') }}</div>

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="exam_location_1" style="width: 20%;">Preferred Exam Location 1:</label>
                <input type="text" id="exam_location_1" name="exam_location_1" value="{{ old('exam_location_1') }}" required style="width: 30%; padding: 8px; margin-right: 2%;">
                <span style="margin-right: 5px;">&emsp;</span>
                <label for="exam_location_2" style="width: 20%;">Preferred Exam Location 2:</label>
                <input type="text" id="exam_location_2" name="exam_location_2" value="{{ old('exam_location_2') }}" required style="width: 30%; padding: 8px;">
            </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('exam_location_1') }}</div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('exam_location_2') }}</div>

            <div class="name-container" style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="exam_location_3" style="width: 20%;">Preferred Exam Location 3:</label>
                <input type="text" id="exam_location_3" name="exam_location_3" value="{{ old('exam_location_3') }}" required style="width: 30%; padding: 8px;">
            </div>
            <div class="error" style="color: red; font-size: 0.9em; margin-bottom: 10px;">{{ $errors->first('exam_location_3') }}</div>

            <!-- Footer -->
            <div class="flex" style="display: flex; justify-content: space-between; align-items: center;">
                <button type="submit" style="background-color: #6366F1; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Save and Next</button>
            </div>
        </form>
    </div>
</body>
</html>
