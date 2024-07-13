<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Input Fields</title>
    <style>
        .input-group {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form id="dynamicForm">
        <div id="inputContainer">
            <div class="input-group">
                <input type="text" name="inputs[]" />
                <button type="button" onclick="addInput(this)">Add</button>
            </div>
        </div>
        <input type="submit" value="Submit" />
    </form>

    <script>
        function addInput(button) {
            const inputGroup = document.createElement('div');
            inputGroup.className = 'input-group';

            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'inputs[]';

            const addButton = document.createElement('button');
            addButton.type = 'button';
            addButton.innerText = 'Add';
            addButton.onclick = function() { addInput(addButton) };

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.innerText = 'Remove';
            removeButton.onclick = function() { removeInput(removeButton) };

            inputGroup.appendChild(input);
            inputGroup.appendChild(addButton);
            inputGroup.appendChild(removeButton);

            document.getElementById('inputContainer').appendChild(inputGroup);
        }

        function removeInput(button) {
            const inputGroup = button.parentNode;
            inputGroup.parentNode.removeChild(inputGroup);
        }
    </script>
</body>
</html>
