import pygame
import random as rand

class Grid:

    def __init__(self, width, height, squareWidth, squareHeight):
        self.width = width
        self.height = height
        self.squareWidth = squareWidth
        self.squareHeight = squareHeight
        self.nodeAmount = 0

class Node(Grid):

    def __init__(self, x, y, weight):
        self.x = x
        self.y = y
        self.weight = weight
        self.nodeVisited = False
        self.nodeObstacle = False
        self.parent = None

    def setLoc(self, x, y):
        self.x = x
        self.y = y

    def getLoc(self):
        return 

pygame.init()

Loop = True

screenSize = width, height = 640, 480

sqHeight = int(height/20)
sqWidth = int(width/20)

screen = pygame.display.set_mode(screenSize)

background = pygame.Surface(screen.get_size()).convert()

background.fill((255,255,255))

screen.blit(background, (0,0))

grid = Grid(int(width/2), int(height/2), sqWidth, sqHeight)

for x in range(grid.width):
    for y in range(grid.height):
        grid.nodeAmount += 1
        node = Node(x, y, rand.randint(1,20))
        nodeFill = pygame.Rect(node.x, node.y, sqWidth, sqHeight)
        background.fill((0,0,0), nodeFill)


while Loop:
    for event in pygame.event.get():
        if event.type == pygame.QUIT: Loop = False
    
    pygame.display.flip()

pygame.quit()