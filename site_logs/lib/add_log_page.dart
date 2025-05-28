import 'package:flutter/material.dart';
import 'dart:typed_data';
import 'dart:io';
import 'package:http/http.dart' as http;
import 'package:file_picker/file_picker.dart';

void main() {
  runApp(const MaterialApp(home: AddLogPage()));
}

class AddLogPage extends StatefulWidget {
  const AddLogPage({super.key});

  @override
  State<AddLogPage> createState() => _AddLogPageState();
}

class _AddLogPageState extends State<AddLogPage> {
  final TextEditingController _title = TextEditingController();
  final TextEditingController _desc = TextEditingController();

  Uint8List? imageBytes;
  String? fileName;
  bool isLoading = false;

  Future<void> pickImage() async {
    FilePickerResult? result = await FilePicker.platform.pickFiles(
      type: FileType.custom,
      allowedExtensions: ['jpg', 'jpeg', 'png'],
    );

    if (result != null && result.files.single.path != null) {
      setState(() {
        fileName = result.files.single.name;
        imageBytes = File(result.files.single.path!).readAsBytesSync();
      });
    } else {
      print("File picking cancelled or failed.");
    }
  }

  Future<void> submitLog() async {
    if (imageBytes == null || _title.text.isEmpty || _desc.text.isEmpty) {
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(content: Text("Please fill all fields and select an image")),
      );
      return;
    }

    setState(() {
      isLoading = true;
    });

    var uri = Uri.parse("https://your-api-endpoint.com/api/upload"); // Replace with your actual endpoint

    var request = http.MultipartRequest('POST', uri)
      ..fields['title'] = _title.text
      ..fields['description'] = _desc.text
      ..files.add(
        http.MultipartFile.fromBytes(
          'image',
          imageBytes!,
          filename: fileName,
        ),
      );

    try {
      var response = await request.send();

      if (response.statusCode == 200) {
        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(content: Text("Log submitted successfully")),
        );
        _title.clear();
        _desc.clear();
        setState(() {
          imageBytes = null;
        });
      } else {
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text("Failed to submit log: ${response.statusCode}")),
        );
      }
    } catch (e) {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text("Error: $e")),
      );
    } finally {
      setState(() {
        isLoading = false;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Add Site Log")),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          children: [
            TextField(
              controller: _title,
              decoration: const InputDecoration(labelText: "Title"),
            ),
            TextField(
              controller: _desc,
              decoration: const InputDecoration(labelText: "Description"),
            ),
            const SizedBox(height: 10),
            ElevatedButton(
              onPressed: pickImage,
              child: const Text("Pick Image"),
            ),
            const SizedBox(height: 10),
            imageBytes != null
                ? Image.memory(imageBytes!, height: 150)
                : const Text("No image selected"),
            const SizedBox(height: 20),
            isLoading
                ? const CircularProgressIndicator()
                : ElevatedButton(
                    onPressed: submitLog,
                    child: const Text("Submit Log"),
                  ),
          ],
        ),
      ),
    );
  }
}
