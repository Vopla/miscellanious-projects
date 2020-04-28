import pygame
import random as rand

class Grid:

    def __init__(self, width, height, squareWidth, squareHeight):
        self.width = width
        self.height = height
        self.squareWidth = squareWidth
        self.squareHeight = squareHeight
        self.nodeAmount = 0
        self.nodeList = []

    def getListItem(self, x, y):
        return self.nodeList[x][y]

class Node:

    def __init__(self, x, y, weight):
        self.x = x
        self.y = y
        self.weight = weight
        self.nodeVisited = False
        self.nodeObstacle = False
        self.parent = None
    
    def checkNeighbors(self, x, y):
        

    def setLoc(self, x, y):
        self.x = x
        self.y = y

    def isObstacle(self):
        return self.nodeObstacle   

    def getLoc(self):
        return self.x, self.y

pygame.init()

Loop = True

WHITE = (255,255,255)
BLACK = (0,0,0)

screenSize = width, height = 640, 480

sqHeight = int(height/10)
sqWidth = int(width/10)

screen = pygame.display.set_mode(screenSize)
pygame.display.set_caption("A* Pathfinding")

background = pygame.Surface(screen.get_size())

grid = Grid(int(width), int(height), sqWidth, sqHeight)

while Loop:

    background.fill(BLACK)

    for y in range(grid.height // sqHeight):
        for x in range(grid.width // sqWidth):
            node = Node(x, y, rand.randint(1,20))
            grid.nodeList.append(node)
            nodeFill = pygame.Rect(node.x * sqWidth, node.y * sqHeight, sqWidth, sqHeight)
            pygame.draw.rect(screen, WHITE, nodeFill, 2)
            grid.nodeAmount += 1

    for event in pygame.event.get():
        if event.type == pygame.QUIT: 
            Loop = False

        elif event.type == pygame.MOUSEBUTTONDOWN:
            pos = pygame.mouse.get_pos()

            column = pos[0] // sqHeight
            row = pos[1] // sqWidth

            #currentSquare = grid.getListItem(column, row)

            print(column, row, node.weight)

            #outline = pygame.Rect(grid.getList((node.x *sqWidth), (node.y * sqHeight), sqWidth+2, sqHeight+2))

            #if grid.nodeList[column][row].node.nodeObstacle is True:
            #    node.nodeObstacle == False

            #else:
            #    node.nodeObstacle == True


    pygame.display.flip()

pygame.quit()