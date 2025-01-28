import 'dart:async';

class TimerManager {
  static late final StreamController<int> _controller;
  static late final Stream<int> _stream;
  static Timer? _timer;
  static int _counter = 0;

  static set controller(StreamController<int> c) {
    _controller = c;
    _stream = _controller.stream;
  }

  static set timer(Timer? v) {
    _timer = v;
  }

  static Stream<int> get stream => _stream;
  static int get counter => _counter;
  static int get hours => _counter ~/ 3600;
  static int get minutes => (_counter % 3600) ~/ 60;
  static int get seconds => _counter % 60;

  static void addCounter() => _counter++;
  static void addEvent() => _controller.add(_counter);
  static void stopTimer() => _timer?.cancel();
  static void resetTimer() {
    stopTimer();
    _counter = 0;
    addEvent();
  }

  static void dispose() {
    _timer?.cancel();
    _controller.close();
  }
}