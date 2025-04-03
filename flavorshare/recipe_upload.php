<!DOCTYPE html>
<html>
<head>
    <title>Upload Recipe</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .recipe-form-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2a5a2a;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border 0.3s;
        }
        input[type="text"]:focus,
        textarea:focus,
        select:focus {
            border-color: #4a8c4a;
            outline: none;
        }
        textarea {
            min-height: 120px;
            resize: vertical;
        }
        .ingredients-textarea {
            min-height: 150px;
        }
        .recipe-image-preview {
            max-width: 200px;
            max-height: 200px;
            display: block;
            margin-top: 10px;
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #4a8c4a;
            color: white;
            border: none;
            padding: 14px 20px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #3a6c3a;
        }
        .form-row {
            display: flex;
            gap: 20px;
        }
        .form-col {
            flex: 1;
        }
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <div class="recipe-form-container">
        <h1>Share Your Recipe</h1>
        <form action="process_recipe.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="recipe-name">Recipe Name*</label>
                        <input type="text" id="recipe-name" name="recipe_name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="prep-time">Preparation Time</label>
                        <input type="text" id="prep-time" name="prep_time" placeholder="e.g., 30 minutes">
                    </div>
                    
                    <div class="form-group">
                        <label for="servings">Servings</label>
                        <input type="text" id="servings" name="servings" placeholder="e.g., 4 people">
                    </div>
                </div>
                
                <div class="form-col">
                    <div class="form-group">
                        <label for="recipe-image">Recipe Image*</label>
                        <input type="file" id="recipe-image" name="recipe_image" accept="image/*" required>
                        <img id="image-preview" class="recipe-image-preview" style="display: none;">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="ingredients">Ingredients* (one per line)</label>
                <textarea id="ingredients" name="ingredients" class="ingredients-textarea" required placeholder="Example:
- 2 cups flour
- 1 tsp salt
- 3 eggs"></textarea>
            </div>
            
            <div class="form-group">
                <label for="instructions">Instructions*</label>
                <textarea id="instructions" name="instructions" required placeholder="Step-by-step instructions..."></textarea>
            </div>
            
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category">
                    <option value="">Select a category</option>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Dessert">Dessert</option>
                    <option value="Snack">Snack</option>
                </select>
            </div>
            
            <button type="submit">Upload Recipe</button>
        </form>
    </div>

    <script>
        // Image preview functionality
        document.getElementById('recipe-image').addEventListener('change', function(e) {
            const preview = document.getElementById('image-preview');
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>