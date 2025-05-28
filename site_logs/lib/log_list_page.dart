import 'package:flutter/material.dart';

class LogListPage extends StatelessWidget {
  const LogListPage({super.key});

  final dummyLogs = const [
    {'title': 'Site A Inspection', 'desc': 'Checked water level.', 'date': '2024-04-21'},
    {'title': 'Site B Issue', 'desc': 'Fixed generator wiring.', 'date': '2024-04-20'},
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('All Site Logs')),
      floatingActionButton: FloatingActionButton(
        onPressed: () => Navigator.pushNamed(context, '/add'),
        child: const Icon(Icons.add),
      ),
      body: ListView.builder(
        itemCount: dummyLogs.length,
        itemBuilder: (context, index) {
          final log = dummyLogs[index];
          return Card(
            margin: const EdgeInsets.all(8),
            child: ListTile(
              title: Text(log['title']!),
              subtitle: Text(log['desc']!),
              trailing: Text(log['date']!),
            ),
          );
        },
      ),
    );
  }
}
