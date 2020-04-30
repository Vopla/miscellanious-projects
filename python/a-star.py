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

class Node:

    def __init__(self, x, y, weight):
        self.x = x
        self.y = y
        self.weight = weight
        self.nodeVisited = False
        self.nodeObstacle = False
        self.parent = None
    
    def checkNeighbors(self, x, y):
        return

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
BLACK = (70,70,70)
GREEN = (0,180,0)

screenSize = width, height = 640, 640

sqHeight = int(height/10)
sqWidth = int(width/10)

screen = pygame.display.set_mode(screenSize)
pygame.display.set_caption("A* Pathfinding")

font = pygame.font.SysFont(None, 32)

grid = Grid(int(width), int(height), sqWidth, sqHeight)

fps = pygame.time.Clock()

while Loop:

    screen.fill(GREEN)

    for y in range(grid.height // sqHeight):
        for x in range(grid.width // sqWidth):
            node = Node(x, y, rand.randint(1,20))
            grid.nodeList.append(node)
            grid.nodeAmount += 1

    for node in grid.nodeList:
        nodeFill = pygame.Rect(node.x * sqWidth, node.y * sqHeight, sqWidth, sqHeight)

        text = font.render(f"{node.x}, {node.y}", 1, WHITE)
        textRect = text.get_rect()
        textRect.centerx = nodeFill.centerx
        textRect.centery = nodeFill.centery
        screen.blit(text, textRect)
        
        if node.nodeVisited:            
            pygame.draw.rect(screen, WHITE, nodeFill, 2)       
        else:
            pygame.draw.rect(screen, BLACK, nodeFill, 2)

    for event in pygame.event.get():
        pos = pygame.mouse.get_pos()

        if event.type == pygame.QUIT: 
            Loop = False

        elif event.type == pygame.MOUSEBUTTONDOWN:

            column = (pos[0] // sqHeight)
            row = (pos[1] // sqWidth)

            for node in grid.nodeList:
                if node.x == row and node.y == column:
                    if node.nodeVisited == False:
                        node.nodeVisited = True
                        print(f"square at location {row}, {column} has been visited.")
                        break
                    
                    elif node.nodeVisited:
                        node.nodeVisited = False
                        print(f"square at location {row}, {column} has been not visited.")
                        break

    fps.tick(60)
    pygame.display.flip()

pygame.quit()