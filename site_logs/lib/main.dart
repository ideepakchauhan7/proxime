import 'package:flutter/material.dart';
import 'login_page.dart';
import 'add_log_page.dart';
import 'log_list_page.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});
  
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Site Logger',
      theme: ThemeData(colorScheme: ColorScheme.fromSeed(seedColor: Colors.blue)),
      initialRoute: '/',
      routes: {
        '/': (context) => LoginPage(),
        '/logs': (context) => const LogListPage(),
        '/add': (context) => const AddLogPage(),
      },
    );
  }
}
