import graphics as g

def main():
    win = g.GraphWin("My Circle", 100, 100)
    c = g.Circle(g.Point(50, 50,), 10)
    c.draw(win)
    win.GetMouse()
    win.Close()

main()